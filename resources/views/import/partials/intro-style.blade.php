 <div>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Introduction style') }}</h2>
 </div>
  <x-select-theme :label="__('Select a theme:')" name="theme_id" :options="$themes" required :selected="old('theme_id')" />
 <x-color-picker :color-label="__('Pick title color :')" color-id="colorTitle" :text-label="__('Color title code :')" text-id="color_title_intro" text-name="color_title" default-value=""/>
 <x-color-picker :color-label="__('Pick year color :')" color-id="colorYear" :text-label="__('Color year code :')" text-id="color_year_intro" text-name="color_year" default-value=""/>
 <x-color-picker :color-label="__('Pick small text color :')" color-id="colorSmallText" :text-label="__('Color small text code :')" text-id="color_small_text_intro" text-name="color_small_text" default-value=""/>
 <x-color-picker :color-label="__('Pick background nav color :')" color-id="colorBackroundNav" :text-label="__('Color background nav code :')" text-id="color_background_nav_intro" text-name="color_background_nav" default-value=""/>
 <x-color-picker :color-label="__('Pick background intro color :')" color-id="colorBackroundIntro" :text-label="__('Color background intro code :')" text-id="color_background_intro" text-name="color_background_intro" default-value=""/>
 <div>
     <x-input-label for="fontTitle" :value="__('Font title:')" />
     <x-text-input id="fontTitle" name="font_title" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_title')" />
 </div>
 <div>
     <x-input-label for="fontSmallText" :value="__('Font small text:')" />
     <x-text-input id="fontSmallText" name="font_small_text" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_small_text')" />
 </div>
 <div>
     <x-input-label for="fontYear" :value="__('Year font:')" />
     <x-text-input id="fontYear" name="font_year" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_year')" />
 </div>
 <div>
     <x-file-input name="img_background_mobile_intro" id="imgBackgroundMobileIntro" label="Intro image mobile" accept="image/*" />
 </div>
 <div>
     <x-file-input name="img_background_intro" id="imgBackgroundIntro" label="Intro image Desktop" accept="image/*" />
 </div>
 <div>
     <x-file-input name="img_nav" id="imgNav" label="Image nav" accept="image/*" />
 </div>
