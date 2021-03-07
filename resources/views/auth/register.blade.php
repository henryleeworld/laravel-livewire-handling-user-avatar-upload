<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="avatar" :value="__('Avatar')" />

                    <input type="file" name="avatars" id="avatars" multiple data-max-files="1">
                </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

    @section('scripts')
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
