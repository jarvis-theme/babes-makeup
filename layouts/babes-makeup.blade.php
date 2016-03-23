<!DOCTYPE html>
<html lang="en">
    <head>
        {{ Theme::partial('seostuff') }} 
        {{ Theme::asset()->styles() }} 
        {{ Theme::partial('defaultcss') }} 
    </head>
    <body>
        <div class="container">
            <section id="main-wrapper">
                {{ Theme::partial('header') }} 
                <section id="main-content">
                    {{ Theme::partial('slider') }} 
                    {{ Theme::place('content') }} 
                </section>
            </section>
            {{ Theme::partial('footer') }} 
        </div>
        <hr class="line-btm">
        {{ Theme::partial('defaultjs') }} 
        {{ Theme::partial('analytic') }} 
    </body>
</html>