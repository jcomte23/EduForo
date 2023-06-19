@csrf

<label for="message" class="block font-medium text-sm text-gray-700">{{__('Message')}}
    <span class="text-xs text-red-600">
        @error('message')
            ({{ $message }})
        @enderror
    </span>
</label>
<textarea type="text" class="form-input w-full rounded-md shadow-sm" name="message">{{ @old('message', @$post->message) }}</textarea>
<hr class="my-4">
<button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md">{{__('Save')}}</button>
