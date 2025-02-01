<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="avatar" :value="__('Avatar')" />
            <x-text-input type="file" name="avatars" class="filepond" id="avatars" multiple data-max-files="1" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    @section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.32.6/filepond.min.css" integrity="sha512-iVA6Ss6TWm6vWJjfSIpUZbqVARxoR305ogPKW1AkaAaXybe5e1Qaii393UQXMFJpCkcPZpvza+cryJl55Kj1hw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.32.6/filepond.min.js" integrity="sha512-sVH0xv/XXXk6JOql+ha35za7uIeFNQxhSAo2tHAmvloeDRXLLBdhablKfZg38beXDzJCHr/+Z7x2aP0o7Lk/Fg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const inputElement = document.querySelector('input[id="avatars"]');
            const pond = FilePond.create( inputElement, {
                credits: false
            });
            FilePond.setOptions({
                labelIdle: '{{ __('Drag & Drop your files or ') }}<span class="filepond--label-action">{{ __('Browse') }}</span>',
                labelInvalidField: '{{ __('Field contains invalid files') }}',
                labelFileWaitingForSize: '{{ __('Waiting for size') }}',
                labelFileSizeNotAvailable: '{{ __('Size not available') }}',
                labelFileLoading: '{{ __('Loading') }}',
                labelFileLoadError: '{{ __('Error during load') }}',
                labelFileProcessing: '{{ __('Uploading') }}',
                labelFileProcessingComplete: '{{ __('Upload complete') }}',
                labelFileProcessingAborted: '{{ __('Upload cancelled') }}',
                labelFileProcessingError: '{{ __('Error during upload') }}',
                labelFileProcessingRevertError: '{{ __('Error during revert') }}',
                labelFileRemoveError: '{{ __('Error during remove') }}',
                labelTapToCancel: '{{ __('tap to cancel') }}',
                labelTapToRetry: '{{ __('tap to retry') }}',
                labelTapToUndo: '{{ __('tap to undo') }}',
                labelButtonRemoveItem: '{{ __('Remove') }}',
                labelButtonAbortItemLoad: '{{ __('Abort') }}',
                labelButtonRetryItemLoad: '{{ __('Retry') }}',
                labelButtonAbortItemProcessing: '{{ __('Cancel') }}',
                labelButtonUndoItemProcessing: '{{ __('Undo') }}',
                labelButtonRetryItemProcessing: '{{ __('Retry') }}',
                labelButtonProcessItem: '{{ __('Upload') }}',
                labelMaxFileSizeExceeded: '{{ __('File is too large') }}',
                labelMaxFileSize: '{{ __('Maximum file size is ') }}{filesize}',
                labelMaxTotalFileSizeExceeded: '{{ __('Maximum total size exceeded') }}',
                labelMaxTotalFileSize: '{{ __('Maximum total file size is ') }}{filesize}',
                labelFileTypeNotAllowed: '{{ __('File of invalid type') }}',
                fileValidateTypeLabelExpectedTypes: '{{ __('Expects ') }}{allButLastType}{{ __(' or ') }}{lastType}',
                imageValidateSizeLabelFormatError: '{{ __('Image type not supported') }}',
                imageValidateSizeLabelImageSizeTooSmall: '{{ __('Image is too small') }}',
                imageValidateSizeLabelImageSizeTooBig: '{{ __('Image is too big') }}',
                imageValidateSizeLabelExpectedMinSize: '{{ __('Minimum size is ') }}{minWidth} × {minHeight}',
                imageValidateSizeLabelExpectedMaxSize: '{{ __('Maximum size is ') }}{maxWidth} × {maxHeight}',
                imageValidateSizeLabelImageResolutionTooLow: '{{ __('Resolution is too low') }}',
                imageValidateSizeLabelImageResolutionTooHigh: '{{ __('Resolution is too high') }}',
                imageValidateSizeLabelExpectedMinResolution: '{{ __('Minimum resolution is ') }}{minResolution}',
                imageValidateSizeLabelExpectedMaxResolution: '{{ __('Maximum resolution is ') }}{maxResolution}', 
                server: {
                    url: '/upload',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                }
            });
        </script>
    @endsection
</x-guest-layout>
