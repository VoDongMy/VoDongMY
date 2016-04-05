<header class="header x_header">
    <div class="language">
        <ul class="language_list">
            <?php
            if(!isset($list_language)) $list_language = '';
            ?>
            @if($list_language)
            @foreach($list_language as $language)
            <li class="language_item ">
                <a href="javascript:;" onclick="changeLanguage('<?php echo App::getLocale(); ?>', '{{ $language->code }}');" class="language_link @if($language->code == App::getLocale()) active @endif">{{ $language->code }}</a>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
    <!-- language -->
    <div class="header_inner">
        <div class="container">
            <h1 class="logo">
                <a href="/<?php echo App::getLocale(); ?>/index" class="logo_item">
                    <img src="{{ asset('assets/images/thumbs/logo_header.png') }}" alt="asiantech" width="176" height="49">
                </a>
            </h1>
            @include('partials.top_menu')
        </div>
    </div>
    <!-- container header_inner-->
</header>
