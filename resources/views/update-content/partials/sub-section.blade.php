 <div>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Sub section style') }}</h2>
 </div>
<x-select-group-sub-section :label="__('Select a subSection:')" name="sub_section_content_id" :options="$subContents" :selected="old('sub_section_content_id')" />
@if($themes->category->name === "Numerologie")
<div>
     <x-input-label for="listNumbers" :value="__('List dates :')" />
     <x-liste-dates />
 </div>
 <div>
     <x-input-label for="listNumbers" :value="__('List numbers :')" />
     <x-liste-numbers/>
 </div>
 <div>
     <x-input-label for="luckyNumber" :value="__('Lucky number :')" />
     <x-text-input id="luckyNumber" name="lucky_number" type="number" class="mt-1 block w-full" />
     <x-input-error class="mt-2" :messages="$errors->get('lucky_number')" />
 </div>
 @endif
 <x-color-picker :color-label="__('Pick title color :')" color-id="colorTitleSubSection" :text-label="__('Color title code :')" text-id="color_title" text-name="color_title" default-value=""/>
 <x-color-picker :color-label="__('Pick subtitle color :')" color-id="colorSubTitleSubSection" :text-label="__('Color subtitle code :')" text-id="color_sub_title" text-name="color_sub_title" default-value=""/>
 <x-color-picker :color-label="__('Pick subparagraph color :')" color-id="colorSubParagraphSubSection" :text-label="__('Color subparagraph code :')" text-id="color_sub_paragraph" text-name="color_sub_paragraph" default-value=""/>
 <x-color-picker :color-label="__('Pick lucky number color :')" color-id="colorLuckyNumber" :text-label="__('Color lucky number code :')" text-id="color_lucky_number" text-name="color_lucky_number" default-value=""/>
 <x-color-picker :color-label="__('Pick border lucky number color :')" color-id="borderColorLuckyNumber" :text-label="__('Color border lucky number code :')" text-id="border_color_lucky_number" text-name="border_color_lucky_number" default-value=""/>
 <x-color-picker :color-label="__('Pick list number color :')" color-id="colorListNumber" :text-label="__('Color list number code :')" text-id="color_list_numbers" text-name="color_list_numbers" default-value=""/>
 <x-color-picker :color-label="__('Pick list dates color :')" color-id="colorListDates" :text-label="__('Color list dates code :')" text-id="color_list_dates" text-name="color_list_dates" default-value=""/>
 <div>
     <x-input-label for="fontTitle" :value="__('Font title:')" />
     <x-text-input id="fontTitleSubSection" name="font_title" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_title')" />
 </div>
 <div>
     <x-input-label for="fontSubTitle" :value="__('Font title:')" />
     <x-text-input id="fontSubTitle" name="font_sub_title" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_sub_title')" />
 </div>
 <div>
     <x-input-label for="fontParagraphSubSection" :value="__('Font title:')" />
     <x-text-input id="fontParagraphSubSection" name="font_paragraph" type="text" class="mt-1 block w-full"/>
     <x-input-error class="mt-2" :messages="$errors->get('font_paragraph')" />
 </div>
 <div>
     <x-file-input name="img" id="img" label="Subsection image" accept="image/*" />
 </div>
