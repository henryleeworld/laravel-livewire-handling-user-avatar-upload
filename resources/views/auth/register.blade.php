<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
                            name="password_confirmation" required />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-label for="avatar" :value="__('Avatar')" />
            <input type="file" name="avatars" id="avatars" multiple data-max-files="1">
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    @section('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.4/filepond.min.css" integrity="sha512-GZs7OYouCNZCZFJ46MulDG9BOd9MjYuJv06Be1vVVQv8EdFP76llX+SUoEK2fJvFiKVO34UKBZ2ckU0psBaXeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @endsection
    @section('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/filepond/4.30.4/filepond.min.js" integrity="sha512-l+50U3iKl0++46sldyNg5mOh27O0OWyWWsU2UnGfIVcxC+fEttAvao0Rns9KclIELHihYJppMWmM5sWof0M7uA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            const inputElement = document.querySelector('input[id="avatars"]');
            const pond = FilePond.create( inputElement, {
                credits: false
            });
            FilePond.setOptions({
                labelIdle: '拖放文件，或者 <span class="filepond--label-action"> 瀏覽 </span>',
                labelInvalidField: '不支援此文件',
                labelFileWaitingForSize: '正在計算檔案大小',
                labelFileSizeNotAvailable: '文件大小不可用',
                labelFileLoading: '加載中',
                labelFileLoadError: '加載錯誤',
                labelFileProcessing: '上載',
                labelFileProcessingComplete: '已上載',
                labelFileProcessingAborted: '上載已取消',
                labelFileProcessingError: '上載出错',
                labelFileProcessingRevertError: '還原錯誤',
                labelFileRemoveError: '刪除錯誤',
                labelTapToCancel: '點擊取消',
                labelTapToRetry: '點擊重試',
                labelTapToUndo: '點擊還原',
                labelButtonRemoveItem: '删除',
                labelButtonAbortItemLoad: '中止',
                labelButtonRetryItemLoad: '重試',
                labelButtonAbortItemProcessing: '取消',
                labelButtonUndoItemProcessing: '取消',
                labelButtonRetryItemProcessing: '重試',
                labelButtonProcessItem: '上載',
                labelMaxFileSizeExceeded: '文件太大',
                labelMaxFileSize: '最大值: {filesize}',
                labelMaxTotalFileSizeExceeded: '超過最大可上傳大小',
                labelMaxTotalFileSize: '最大可上傳大小：{filesize}',
                labelFileTypeNotAllowed: '不支援此類型文件',
                fileValidateTypeLabelExpectedTypes: '應為 {allButLastType} 或 {lastType}',
                imageValidateSizeLabelFormatError: '不支持此類圖像類型',
                imageValidateSizeLabelImageSizeTooSmall: '圖像太小',
                imageValidateSizeLabelImageSizeTooBig: '圖像太大',
                imageValidateSizeLabelExpectedMinSize: '最小值: {minWidth} × {minHeight}',
                imageValidateSizeLabelExpectedMaxSize: '最大值: {maxWidth} × {maxHeight}',
                imageValidateSizeLabelImageResolutionTooLow: '分辨率太低',
                imageValidateSizeLabelImageResolutionTooHigh: '分辨率太高',
                imageValidateSizeLabelExpectedMinResolution: '最小分辨率：{minResolution}',
                imageValidateSizeLabelExpectedMaxResolution: '最大分辨率：{maxResolution}', 
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
