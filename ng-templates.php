    <?php 
        // script url
        $scriptUrl = "https://script.google.com/macros/s/AKfycbxSLxSc1hQDCem19CwratFghY8qzc65iLYfPOIZMAQa9IE1u7k/exec";
    ?>
    <script type="application/json" id="section-titles">
        {
            "url": "<?php echo home_url(); ?>",
            "archives": "<?php _e( 'Archives', 'html5blank' ); ?>",
            "categories": "<?php _e( 'Categories for ', 'html5blank' ); ?>",
            "posts": "<?php _e( 'Latest Posts', 'html5blank' ); ?>",
            "tags": "<?php _e( 'Tag Archive: ', 'html5blank' ); ?>",
            "author": "<?php _e( 'Tag Archive: ', 'html5blank' ); ?>",
            "categoriesIn": "<?php _e( 'Categorised in: ', 'html5blank' ); ?>"
        }
    </script>
    <script type="text/ng-template" id="pages-template.html">
        <section>
            <article class="article article--page page">
                <h1 class="main__title" ng-bind-html="trustHtml(data.title.rendered)"></h1>
                <div class="article__content" 
                    ng-if="data.slug !== 'contacto'"
                    ng-bind-html="trustHtml(data.content.rendered)"></div>
                <div class="article__content"
                    ng-if="data.slug === 'contacto'"
                    aata-form="<?php echo $scriptUrl; ?>"></div>
            </article>
        </section>
    </script>
    <script type="text/ng-template" id="posts-template.html">
        <article id="post-{{data.id}}" class="article article--post post">
            <!-- post title -->
            <h1 class="main__title"
                ng-bind-html="trustHtml(data.title.rendered)"></h1>
            <!-- /post title -->
            <div class="article__content">
                <!-- post details -->
                <time class="article__date" ng-bind="formatDate(data.date)"></time>
                <span class="article__author" ng-bind="'Escrito por: ' + meta.author.name"></span>
                <!-- /post details -->
                <div ng-bind-html="trustHtml(data.content.rendered)"></div>
            </div>
            <div class="article__tags" ng-if="data.tags.length > 0">
                <span class="sr-only" ng-bind="lang.tags"></span>
                <?php get_template_part('img/icons/tagicon'); ?>
                <a href="{{tagInfo.link}}"
                    ng-repeat="tag in data.tags"
                    ng-init="tagInfo = findTagById(tag, tags)"
                    ng-click="fetch.allByTag($event, tagInfo)"
                    ng-bind="($last !== true) ? tagInfo.name + ', ' : tagInfo.name"></a>
            </div>
        </article>
    </script>
    <script type="text/ng-template" id="loop-template.html">
        <section class="" 
            data-current-page="{{currentPage}}">
            <div ng-if="append != true && loopType != 'tags'">
                <?php if(!function_exists('dynamic_sidebar') || !dynamic_sidebar('widget-area-1')) ?>
            </div>
            <h1 class="main__title main__title--margin"
                ng-if="append != true && loopType == 'tags'"
                ng-bind="lang[loopType] + ' ' + meta.name"></h1>
            <article ng-repeat="item in data" 
                id="post-{{item.id}}"
                class="article">
                <!-- post title -->
                <h2 class="article__title">
                    <a title="{{item.title.rendered}}"
                        href="{{item.link}}"
                        ng-bind-html="trustHtml(item.title.rendered)"
                        ng-click="fetch.byId($event, 'posts', item.id)"></a>
                </h2>
                <!-- /post title -->
                <!-- post details -->
                <div class="article__date">
                    <time datetime="{{item.date}}" ng-bind="formatDate(item.date)"></time>
                </div>
                <div class="article__excerpt">
                    <!-- /post details -->
                    <p ng-bind-html="trustHtml(item.excerpt.rendered)"></p>
                </div>
            </article>
        </section>
    </script>
    <script type="text/ng-template" id="expand.html">
        <button class="expand"
            ng-click="showChildren = !showChildren"
            aria-expanded="{{showChildren}}">
                <span class="sr-only">Expandir</span>
                <?php get_template_part('img/icons/add'); ?>
        </button>
    </script>
    <script type="text/ng-template" id="form.html">
        <form class="aata-form" method="POST" 
            action="{{url}}">

            <label class="aata-form__label" for="name">Nombre</label>
            <input id="name" class="aata-form__input" name="name" ng-model="name" />

            <label class="aata-form__label" for="lastName">Apellido Paterno</label>
            <input id="lastName" class="aata-form__input" name="lastName" ng-model="lastName" />

            <label class="aata-form__label" for="email">Email</label>
            <input id="email" class="aata-form__input" name="email" ng-model="email" />

            <label class="aata-form__label" for="tel">Teléfono</label>
            <input id="tel" class="aata-form__input" name="tel" ng-model="tel" />

            <label class="aata-form__label" for="comments">Preguntas o Comentarios</label>
            <textarea id="comments" class="aata-form__input" name="comments"
                    ng-model="comments"></textarea>

            <button type="submit" class="button aata-form__button"
                    ng-click="submitForm($event)"
                    >Enviar</button>
        </form>
    </script>