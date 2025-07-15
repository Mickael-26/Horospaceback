 <div x-data="{ list_dates: [] }" class="space-y-2">
     <template x-for="(date, index) in list_dates" :key="index">
         <div class="flex items-center space-x-2">
             <input type="date" x-model="list_dates[index]" name="list_dates[]" class="border p-2 rounded w-full">
             <button type="button" @click="list_dates.splice(index, 1)"
                 class="bg-red-500 text-white px-2 py-1 rounded">{{ __('Delete') }}</button>
         </div>
     </template>
     <button type="button" @click="list_dates.push('')"
         class="bg-indigo-500 text-white px-3 py-1 rounded">{{ __('Add dates') }}</button>
 </div>
