 <div>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Style form contact') }}</h2>
 </div>
 <div>
     <x-input-label for="colorFormText" :value="__('Color form text :')" />
     <x-text-input id="colorFormText" name="color_text" type="color" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('color_text')" />
 </div>
 <div>
     <x-input-label for="colorBackgroundFormContact" :value="__('Backgroungd color form :')" />
     <x-text-input id="colorBackgroundFormContact" name="color_background_form" type="color" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('color_background_form_contact')" />
 </div>
