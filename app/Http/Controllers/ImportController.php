<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportFileRequest;
use App\Models\FormContactStyle;
use App\Models\IntroContent;
use App\Models\Medias;
use App\Models\SectionContent;
use App\Models\Theme;
use App\Models\ThemeContent;
use App\Models\ZodiacSignStyle;
use App\Models\SubSectionContent;
use App\Models\Category;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use App\Repositories\Theme\ThemeRepository;
use Illuminate\View\View;
use Str;

class ImportController extends Controller
{
    /**
     * Summary of index
     * @return \Illuminate\View\View;
     */
    public function index(): View
    {
        // Récupère toutes les catégories
        $categories = Category::all();
        // Récupère le dernier contenu de thème avec l'ID et le slug
        $themes = ThemeContent::select('themes.id', 'theme_contents.slug')
            ->join('themes', 'theme_contents.theme_id', '=', 'themes.id')
            ->latest('theme_contents.id')  // Trie par le plus récent
            ->limit(1)
            ->where('theme_contents.language_id', '=', 1)  // Langue française 
            ->get();
        // Retourne la vue avec les données à afficher
        return view('import.import-content', compact('categories', 'themes'));
    }
    
    /**
     * Summary of import
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function import(ImportFileRequest $request)
    {
        // Validation des données envoyées par le formulaire
        $data = $request->validated();
        // Récupère l'ID de l'utilisateur connecté
        $userId = $request->user()->id;
        // Charge le fichier Excel avec PhpSpreadsheet
        $file = $data['file'];
        $spreadsheet = IOFactory::load($file);
        // Vérifie si le fichier est vide
        $isEmpty = true;
        foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
            $rows = $sheet->toArray();
            if (count($rows) > 1) { // plus d'une ligne = données présentes
                $isEmpty = false;
            }
        }
        if ($isEmpty) {
            return back()->withErrors(['file' => 'Le fichier est vide ou ne contient aucune donnée à importer.']);
        }
        // Création des éléments liés au thème
        $mediaId = $this->createMedias();
        $formStyleId = $this->createFormContactStyle();
        $zodiacstyleId = $this->createZodiacSignStyle();
        $themeId = $this->createTheme($formStyleId, $zodiacstyleId, $mediaId, $userId, $data['category_id']);
        // Tableau pour stocker les IDs de sections (nécessaire pour les sous-sections)
        $sectionIds = [];
        // Parcours de chaque feuille du fichier Excel
        foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
            $sheetTitle = $sheet->getTitle();
            $rows = $sheet->toArray();
            // Ignore les feuilles vides ou avec une seule ligne (souvent les en-têtes)
            if (empty($rows) || count($rows) < 2) {
                continue; // feuille vide ou seulement les en-têtes
            }
            // Parcours des lignes de la feuille
            foreach ($rows as $i => $row) {
                if ($i === 0) {
                    continue; // Ignore la première ligne (en-têtes)
                }
                // Si la feuille concerne les contenus de thème
                if ($sheetTitle === 'theme_contents') {
                    $themeContent = ThemeContent::create([
                        'slug' => $this->cleanData($row[0]),
                        'description' => $this->cleanData($row[1]),
                        'language_id' => $this->cleanData($row[2]),
                        'theme_id' => $themeId
                    ]);
                } elseif ($sheetTitle === 'intro_contents') {  // Si la feuille concerne les introductions
                    $introContent = IntroContent::create([
                        'title' => $this->cleanData($row[0]),
                        'small_text' => $this->cleanData($row[1]),
                        'year' => $this->formatDate($this->cleanData($row[2])),
                        'language_id' => $this->cleanData($row[3]),
                        'theme_id' => $themeId
                    ]);
                } elseif ($sheetTitle === 'section_contents') {  // Si la feuille concerne les sections
                    $sectionContent = SectionContent::create(attributes: [
                        'title' => $this->cleanData($row[0]),
                        'language_id' => $this->cleanData($row[1]),
                        'theme_id' => $themeId,
                    ]);
                    // Stocke l'ID de la section en fonction de son titre
                    $sectionIds[$row[0]] = $sectionContent->id;
                }
            }
        }
        // Deuxième parcours pour les sous-sections
        foreach ($spreadsheet->getWorksheetIterator() as $sheet) {
            $sheetTitle = $sheet->getTitle();
            if ($sheetTitle !== 'sub_section_contents') continue;

            $rows = $sheet->toArray();

            foreach ($rows as $i => $row) {
                if ($i === 0) {
                    continue;
                }
                // Récupère le titre de section correspondant (colonne 5)
                $sectionTitle = isset($row[5]) ? $row[5] : null;
                // Récupère l'ID de la section associée
                $section_id = $sectionTitle && isset($sectionIds[$sectionTitle]) ? $sectionIds[$sectionTitle] : null;
                // Tableau d'ID des signes astro
                $arrayIds = $this->stringIdToArrayOfId($row[4]);
                // Création de la sous-section
                foreach ($arrayIds as $arrayId) {
                    SubSectionContent::create([
                        'title' => isset($row[0]) ? $this->cleanData($row[0]) : null,
                        'sub_title' => isset($row[1]) ? $this->cleanData($row[1]) : null,
                        'paragraph' => isset($row[2]) ? $this->cleanData($row[2]) : null,
                        'language_id' => $this->cleanData($row[3]),
                        'zodiac_sign_id' => $this->cleanData($arrayId),
                        'section_content_id' => $section_id,
                    ]);
                }
            }
        }
        // Redirige vers la page précédente avec un message de succès
        return back()->with('status', 'file-imported');
    }

    /**
     * Summary of stringIdToArrayOfId
     * @param string $listId
     * @return array
     */
    private function stringIdToArrayOfId(string $listId): array
    {
        $array = [];

        if (empty($listId)) {
            array_push($array, 1);
        } else {
            $array = explode(',', $listId);
        }


        return $array;
    }

    /**
     * Summary of formatDate
     * @param string $date
     * @return string
     */
    private function formatDate(string $date): string
    {
        $result = '';
        if (empty($date)) {
            $data = date('Y-m-d');
            $result = $data;
        } else {
            if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $date)) {
                $result = $date;
            } else {
                if (preg_match('/(0[1-9]|1[0-9]|3[01])\/(0[1-9]|1[012])\/(2[0-9][0-9][0-9]|1[6-9][0-9][0-9])/', $date)) {
                    $explode = explode('/', $date);
                    $reverseArray = array_reverse($explode);
                    $implode = implode('-', $reverseArray);
                    $result = $implode;
                } else {
                    if (preg_match('#^[0-9]{4}$#', $date)) {
                        $result = $date . '-' . '01' . '-' . '01';
                    } else {
                        if (preg_match('/^(((0[1-9]|[12]\d|3[01])\-(0[13578]|1[02])\-((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\-(0[13456789]|1[012])\-((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\-02\-((19|[2-9]\d)\d{2}))|(29\-02\-((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))$/', $date)) {
                            $explode = explode('-', $date);
                            $reverseArray = array_reverse($explode);
                            $implode = implode('-', $reverseArray);
                            $result = $implode;
                        }
                    }
                }
            }
        }
        return $result;
    }

    /**
     * Summary of cleanData
     * @param string $data
     * @return string
     */
    private function cleanData(string $data): string
    {
        // Convertit en UTF-8
        $data = mb_convert_encoding($data, 'UTF-8', 'auto');
        // Retire les caractères de contrôle
        $data = preg_replace('/[\x00-\x1F\x7F]/u', '', $data);
        // Retire les balises HTML
        $data = strip_tags($data);
        // Trim
        return trim($data);
    }

    /**
     * Summary of createFormContactStyle
     * @return int
     */
    private function createFormContactStyle(): int
    {
        $form = FormContactStyle::create([
            'color_text' => '#000000',
            'color_background' => '#fff'
        ]);
        return $form->id;
    }

    /**
     * Summary of createZodiacSignStyle
     * @return int
     */
    private function createZodiacSignStyle(): int
    {
        $zodiacStyle = ZodiacSignStyle::create([
            'color_background' => '#000000',
            'color_name' => '#fff',
            'font' => 'Arial'
        ]);
        return $zodiacStyle->id;
    }

    /**
     * Summary of createMedias
     * @return int
     */
    private function createMedias(): int
    {
        $media = Medias::create([
            'img_theme' => 'default'
        ]);
        return $media->id;
    }

    /**
     * Summary of createTheme
     * @param int $unFormContactStyleId
     * @param int $unzodiacStyleId
     * @param int $unMediaId
     * @return int
     */
    private function createTheme(int $unFormContactStyleId, int $unzodiacStyleId, int $unMediaId, int $unUserId, int $unCategoryId): int
    {
        $theme = Theme::create([
            'user_id' => $unUserId,
            'category_id' => $unCategoryId,
            'medias_id' => $unMediaId,
            'zodiac_sign_style_id' => $unzodiacStyleId,
            'form_contact_style_id' => $unFormContactStyleId,
        ]);
        return $theme->id;
    }
}
