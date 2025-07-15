 <div>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Section style') }}</h2>
 </div>
 <x-select-group-section :label="__('Select a section:')" name="section_content_id" :options="$options" required :selected="old('section_content_id')" />
 <x-color-picker :color-label="__('Pick title section color :')" color-id="colorTitleSection" :text-label="__('Color title section code :')" text-id="color_title_section" text-name="color_title" default-value=""/>
 <x-color-picker :color-label="__('Pick background section color :')" color-id="colorBackgroundSection" :text-label="__('Color background section code :')" text-id="color_background_section" text-name="color_background" default-value=""/>
 <div>
     <x-input-label for="fontTitle" :value="__('Font title:')" />
     <x-text-input id="fontTitleSection" name="font_title" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_title')" />
 </div>
 <div>
     <x-file-input name="img_background" id="imgBackgroundSection" label="Image background section" accept="image/*" />
 </div>
 <div>
     <x-file-input name="img_section" id="imgSection" label="Image section" accept="image/*" />
 </div>
