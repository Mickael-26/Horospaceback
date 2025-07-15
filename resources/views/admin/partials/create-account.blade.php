 <div>
     <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create account') }}</h2>
 </div>
 <div>
     <x-input-label for="name" :value="__('Name :')" />
     <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required />
     <x-input-error class="mt-2" :messages="$errors->get('name')" />
 </div>
 <div>
     <x-input-label for="email" :value="__('Email :')" />
     <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('email')" />
 </div>
 <div>
     <x-input-label for="password" :value="__('Password :')" />
     <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" required />
     <x-input-error class="mt-2" :messages="$errors->get('password')" />
 </div>
 <div>
     <x-input-label for="password_confirmation" :value="__('Confirmed password :')" />
     <x-text-input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full"
         required />
     <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />
 </div>
 <x-select-role label="Select role" name="role_id" :options="$roles" required />
