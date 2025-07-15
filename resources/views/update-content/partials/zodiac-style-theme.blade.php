 <div>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Style zodiac sign') }}</h2>
 </div>
 <div>
     <x-input-label for="zodiacStyleColorName" :value="__('Color zodiac sign name :')" />
     <x-text-input id="zodiacStyleColorName" name="color_name" type="color" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('color_name')" />
 </div>
 <div>
     <x-input-label for="zodiacStyleBgColor" :value="__('Backgroungd color zodiac sign :')" />
     <x-text-input id="zodiacStyleBgColor" name="color_background" type="color" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('color_background')" />
 </div>
 <div>
     <x-input-label for="zodiacStyleFont" :value="__('Font zodiac sign :')" />
     <x-text-input id="zodiacStyleFont" name="font" type="text" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('font')" />
 </div>