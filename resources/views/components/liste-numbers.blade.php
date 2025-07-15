 <div x-data="{ list_numbers: [] }" class="space-y-2">
     <template x-for="(number, index) in list_numbers" :key="index">
         <div class="flex items-center space-x-2">
             <input type="number" x-model="list_numbers[index]" name="list_numbers[]" class="border p-2 rounded w-full">
             <button type="button" @click="list_numbers.splice(index, 1)" class="bg-red-500 text-white px-2 py-1 rounded">{{ __('Delete') }}</button>
         </div>
     </template>
     <button type="button" @click="list_numbers.push('')" class="bg-indigo-500 text-white px-3 py-1 rounded">{{ __('Add number') }}</button>
 </div>
