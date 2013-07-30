<?php
/** Chechen (нохчийн)
 *
 * See MessagesQqq.php for message documentation incl. usage of parameters
 * To improve a translation please visit http://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 * @author Chechenka
 * @author Comp1089
 * @author Girdi
 * @author Mega programmer
 * @author Sasan700
 * @author Умар
 */

$fallback = 'ru';

$namespaceNames = array(
	NS_MEDIA            => 'Медиа',
	NS_SPECIAL          => 'Белхан',
	NS_TALK             => 'Дийцаре',
	NS_USER             => 'Декъашхо',
	NS_USER_TALK        => 'Декъашхон_дийцаре',
	NS_PROJECT_TALK     => '{{GRAMMAR:genitive|$1}}_дийцаре',
	NS_FILE             => 'Файл',
	NS_FILE_TALK        => 'Файлан_дийцаре',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki_дийцаре',
	NS_TEMPLATE         => 'Кеп',
	NS_TEMPLATE_TALK    => 'Кепан_дийцаре',
	NS_HELP             => 'ГӀо',
	NS_HELP_TALK        => 'ГӀо_дийцаре',
	NS_CATEGORY         => 'Категори',
	NS_CATEGORY_TALK    => 'Категорин_дийцаре',
);

$namespaceAliases = array(
	'Медйа'            => NS_MEDIA,
	'Башхо'            => NS_SPECIAL,
	'Дийца'            => NS_TALK,
	'Юзер'             => NS_USER,
	'Юзери_дийца'      => NS_USER_TALK,
	'Дийцаре_декъашхо' => NS_USER_TALK,
	'$1_Дийца'         => NS_PROJECT_TALK,
	'Дийцаре_{{GRAMMAR:genitive|$1}}' => NS_PROJECT_TALK,
	'Сурт'             => NS_FILE,
	'Сурти_дийца'      => NS_FILE_TALK,
	'Хlум'             => NS_FILE,
	'Хlуман_дийцаре'   => NS_FILE_TALK,
	'Дийцаре_хlуман'   => NS_FILE_TALK,
	'МедйаВики'        => NS_MEDIAWIKI,
	'МедйаВики_дийца'  => NS_MEDIAWIKI_TALK,
	'MediaWiki_Дийцаре' => NS_MEDIAWIKI_TALK,
	'Дакъан'           => NS_TEMPLATE,
	'Дакъан_дийца'     => NS_TEMPLATE_TALK,
	'Куцкеп'           => NS_TEMPLATE,
	'Куцкеп_дийцаре'   => NS_TEMPLATE_TALK,
	'ГІо'              => NS_HELP,
	'ГІодан_дийца'     => NS_HELP_TALK,
	'Гlо'              => NS_HELP,
	'Гlон_дийцаре'     => NS_HELP_TALK,
	'Тоба'             => NS_CATEGORY,
	'Тобан_дийца'      => NS_CATEGORY_TALK,
	'Кадегар'          => NS_CATEGORY,
	'Кадегар_дийцаре'  => NS_CATEGORY_TALK,
);

// Remove Russian aliases
$namespaceGenderAliases = array();

$specialPageAliases = array(
	'Activeusers'               => array( 'Жигара_декъашхой' ),
	'Allmessages'               => array( 'ГӀирса_хаамаш' ),
	'Allpages'                  => array( 'Массо_агӀонаш' ),
	'Ancientpages'              => array( 'Яззамаш_оцу_терахьца_тяххьара_тадар_дина_долу' ),
	'Badtitle'                  => array( 'Хилийта_йиш_йоцу_цӀе' ),
	'Blankpage'                 => array( 'Еса_агӀо' ),
	'Block'                     => array( 'Блоктоха' ),
	'Blockme'                   => array( 'Блоктоха_суна' ),
	'Booksources'               => array( 'Жайнашан_хьосташ' ),
	'BrokenRedirects'           => array( 'ДIахаьдна_долу_дIасахьажораш' ),
	'Categories'                => array( 'Категореш' ),
	'ChangeEmail'               => array( 'Хийца_e-mail' ),
	'ChangePassword'            => array( 'Хийца_ишар' ),
	'ComparePages'              => array( 'АгӀонаш_юстар' ),
	'Confirmemail'              => array( 'Бакъе_e-mail' ),
	'Contributions'             => array( 'Къинхьегам' ),
	'CreateAccount'             => array( 'Кхолла_декъашхон_дӀаяздар' ),
	'Deadendpages'              => array( 'Дика_йоцу_агӀонаш' ),
	'DeletedContributions'      => array( 'ДӀабяхкина_къинхьегам' ),
	'Disambiguations'           => array( 'Цхьатера_маьӀна_дерш' ),
	'DoubleRedirects'           => array( 'ШалгӀа_дӀасахьажийнарш' ),
	'EditWatchlist'             => array( 'Табе_тергаме_могӀам' ),
	'Emailuser'                 => array( 'Декъашхочунга_кехат' ),
	'Export'                    => array( 'Экспорт' ),
	'Fewestrevisions'           => array( 'Наггахь_беш_болу_хицамаш' ),
	'FileDuplicateSearch'       => array( 'Цхьатера_файлаш_лахар' ),
	'Filepath'                  => array( 'Файл_йолче' ),
	'Import'                    => array( 'Импорт' ),
	'Invalidateemail'           => array( 'Адрес_бакъдар_юхадаккха' ),
	'JavaScriptTest'            => array( 'JavaScript_тестировать_ян' ),
	'BlockList'                 => array( 'Блоктоьхнарш' ),
	'LinkSearch'                => array( 'Хьажоригаш_лахар' ),
	'Listadmins'                => array( 'Куьгалхойн_могӀам' ),
	'Listbots'                  => array( 'Шаболх_бечара_могӀам' ),
	'Listfiles'                 => array( 'Файланши_могӀам' ),
	'Listgrouprights'           => array( 'Декъашхошан_бакъонаш' ),
	'Listredirects'             => array( 'ДIасахьажоран_могIам' ),
	'Listusers'                 => array( 'Декъашхойн_могӀам' ),
	'Lockdb'                    => array( 'Хааман_базан_блоктохар' ),
	'Log'                       => array( 'Тептарш' ),
	'Lonelypages'               => array( 'Байлахь_йисина_агIонаш' ),
	'Longpages'                 => array( 'Беха_яззамаш' ),
	'MergeHistory'              => array( 'Цхьаьнатоьхна_категореш' ),
	'MIMEsearch'                => array( 'MIME_чухула_лахар' ),
	'Mostcategories'            => array( 'Дуккха_категореш_тӀе_тоьхна_йолу_агӀонаш' ),
	'Mostimages'                => array( 'Массарел_дуккха_лелайо_файлаш' ),
	'Mostinterwikis'            => array( 'Дукха_юкъарвики_хьажоригаш' ),
	'Mostlinked'                => array( 'Дуккха_хьажоригаш_тIе_тоьхна_йолу_агIонаш' ),
	'Mostlinkedcategories'      => array( 'Дуккха_тӀе_хьажораш_йолу_категореш' ),
	'Mostlinkedtemplates'       => array( 'Массарел_дуккха_а_леладо_кепаш' ),
	'Mostrevisions'             => array( 'Сих_сиха_нисйина_йолу_агIонаш' ),
	'Movepage'                  => array( 'АгӀона_цӀе_хийцар' ),
	'Mycontributions'           => array( 'Сан_къинхьегам' ),
	'Mypage'                    => array( 'Сан_агӀо' ),
	'Mytalk'                    => array( 'Сан_дийцаре' ),
	'Myuploads'                 => array( 'Сан_файлаш' ),
	'Newimages'                 => array( 'Керла_файлаш' ),
	'Newpages'                  => array( 'Керла_агӀонаш' ),
	'PermanentLink'             => array( 'Гуттарлера_хьажориг' ),
	'Popularpages'              => array( 'ГӀарялла_агӀонаш' ),
	'Preferences'               => array( 'ГӀирсаш' ),
	'Prefixindex'               => array( 'Хьалха_агIонашан_цIераш_хIотто_йеза' ),
	'Protectedpages'            => array( 'ГIаролла_дина_агIонаш' ),
	'Protectedtitles'           => array( 'ГIаролла_дина_цIераш' ),
	'Randompage'                => array( 'Цахууш_нисйелла_агIо' ),
	'Randomredirect'            => array( 'Цахууш_нисделла_дIасахьажор' ),
	'Recentchanges'             => array( 'Керла_нисдарш' ),
	'Recentchangeslinked'       => array( 'Кхуьнца_долу_нисдарш' ),
	'Revisiondelete'            => array( 'ДӀадяхна_нисдарш' ),
	'Search'                    => array( 'Лахар' ),
	'Shortpages'                => array( 'Боцоа_яззамаш' ),
	'Specialpages'              => array( 'Леррина_агӀонаш' ),
	'Statistics'                => array( 'Бухехьдерг' ),
	'Tags'                      => array( 'Билгалонаш' ),
	'Unblock'                   => array( 'БлокдӀаякхар' ),
	'Uncategorizedcategories'   => array( 'Категореш_йоцу_категореш' ),
	'Uncategorizedimages'       => array( 'Категореш_йоцу_файлаш' ),
	'Uncategorizedpages'        => array( 'Категореш_йоцу_агIонаш' ),
	'Uncategorizedtemplates'    => array( 'Категореш_йоцу_кепаш' ),
	'Undelete'                  => array( 'МеттахӀоттор' ),
	'Unlockdb'                  => array( 'БлокдӀаякхар_ХБ' ),
	'Unusedcategories'          => array( 'Лелош_доцу_категореш' ),
	'Unusedimages'              => array( 'Лелош_доцу_файлаш' ),
	'Unusedtemplates'           => array( 'Лелош_доцу_кепаш' ),
	'Upload'                    => array( 'Файл_чуяккхар' ),
	'UploadStash'               => array( 'ДӀахьулйина_файл_чуяккхар' ),
	'Userlogin'                 => array( 'Чувалар/ялар' ),
	'Userlogout'                => array( 'Аравалар/ялар' ),
	'Userrights'                => array( 'Бакъона_урхалладар' ),
	'Version'                   => array( 'Верси' ),
	'Wantedcategories'          => array( 'Оьшуш_йолу_категореш' ),
	'Wantedfiles'               => array( 'Оьшуш_йолу_файлаш' ),
	'Wantedpages'               => array( 'Оьшуш_йолу_агIонаш' ),
	'Wantedtemplates'           => array( 'Оьшуш_йолу_кепаш' ),
	'Watchlist'                 => array( 'Тергаме_могӀам' ),
	'Whatlinkshere'             => array( 'Хьажоригаш_кхузе' ),
	'Withoutinterwiki'          => array( 'Кхечу_меттанашан_хьажориг_йоцу_агIонаш' ),
);

$magicWords = array(
	'redirect'                  => array( '0', '#дlасахьажайар\'', '\'#хьажайо\'', '\'#REDIRECT', '#перенаправление', '#перенапр', '#REDIRECT' ),
	'notoc'                     => array( '0', '__БАЦ_ЧУЛАЦАМ__', '__БАЦ_ЧУЛ__', '__БЕЗ_ОГЛАВЛЕНИЯ__', '__БЕЗ_ОГЛ__', '__NOTOC__' ),
	'nogallery'                 => array( '0', '__ЙАЦ_УЧЕ__', '__БЕЗ_ГАЛЕРЕИ__', '__NOGALLERY__' ),
	'forcetoc'                  => array( '0', '__ТlЕДУЬЛЛУ_ЧУЛАЦАМБАР__', '__ТlЕДУЬЛ_ЧУЛ__', '__ОБЯЗАТЕЛЬНОЕ_ОГЛАВЛЕНИЕ__', '__ОБЯЗ_ОГЛ__', '__FORCETOC__' ),
	'toc'                       => array( '0', '__ЧУЛАЦАМ__', '__ЧУЛ__', '__ОГЛАВЛЕНИЕ__', '__ОГЛ__', '__TOC__' ),
	'noeditsection'             => array( '0', '__ЦАМЕГ_РЕДАККХА_АГlОН__', '__БЕЗ_РЕДАКТИРОВАНИЯ_РАЗДЕЛА__', '__NOEDITSECTION__' ),
	'currentmonth'              => array( '1', 'КАРАРА_БУТТ', 'КАРАРА_БУТТ_2', 'ТЕКУЩИЙ_МЕСЯЦ', 'ТЕКУЩИЙ_МЕСЯЦ_2', 'CURRENTMONTH', 'CURRENTMONTH2' ),
	'currentmonth1'             => array( '1', 'КАРАРА_БУТТ_1', 'ТЕКУЩИЙ_МЕСЯЦ_1', 'CURRENTMONTH1' ),
	'currentmonthname'          => array( '1', 'КАРАРАЧУ_БЕТТА_ЦlЕ', 'НАЗВАНИЕ_ТЕКУЩЕГО_МЕСЯЦА', 'CURRENTMONTHNAME' ),
	'currentmonthnamegen'       => array( '1', 'КАРАРАЧУ_БЕТТА_ЦlЕ_МУХ', 'НАЗВАНИЕ_ТЕКУЩЕГО_МЕСЯЦА_РОД', 'CURRENTMONTHNAMEGEN' ),
	'currentmonthabbrev'        => array( '1', 'КАРАРАЧУ_БЕТТА_ЦlЕ_АБР', 'НАЗВАНИЕ_ТЕКУЩЕГО_МЕСЯЦА_АБР', 'CURRENTMONTHABBREV' ),
	'currentday'                => array( '1', 'КАРАРА_ДЕ', 'ТЕКУЩИЙ_ДЕНЬ', 'CURRENTDAY' ),
	'currentday2'               => array( '1', 'КАРАРА_ДЕ_2', 'ТЕКУЩИЙ_ДЕНЬ_2', 'CURRENTDAY2' ),
	'currentdayname'            => array( '1', 'КАРАРАЧУ_ДЕ_ЦlЕ', 'НАЗВАНИЕ_ТЕКУЩЕГО_ДНЯ', 'CURRENTDAYNAME' ),
	'currentyear'               => array( '1', 'КАРАРА_ШО', 'ТЕКУЩИЙ_ГОД', 'CURRENTYEAR' ),
	'currenttime'               => array( '1', 'КАРАРА_ХАН', 'ТЕКУЩЕЕ_ВРЕМЯ', 'CURRENTTIME' ),
	'currenthour'               => array( '1', 'КАРАРА_САХЬТ', 'ТЕКУЩИЙ_ЧАС', 'CURRENTHOUR' ),
	'localmonth'                => array( '1', 'МЕТТИГАН_БУТТ', 'МЕСТНЫЙ_МЕСЯЦ_2', 'МЕСТНЫЙ_МЕСЯЦ', 'LOCALMONTH', 'LOCALMONTH2' ),
	'localmonth1'               => array( '1', 'МЕТТИГАН_БУТТ_1', 'МЕСТНЫЙ_МЕСЯЦ_1', 'LOCALMONTH1' ),
	'localmonthname'            => array( '1', 'МЕТТИГАН_БЕТТА_ЦlЕ', 'НАЗВАНИЕ_МЕСТНОГО_МЕСЯЦА', 'LOCALMONTHNAME' ),
	'localmonthnamegen'         => array( '1', 'МЕТТИГАН_БЕТТА_ЦlЕ_МУХ', 'НАЗВАНИЕ_МЕСТНОГО_МЕСЯЦА_РОД', 'LOCALMONTHNAMEGEN' ),
	'localmonthabbrev'          => array( '1', 'МЕТТИГАН_БЕТТА_ЦlЕ_АБР', 'НАЗВАНИЕ_МЕСТНОГО_МЕСЯЦА_АБР', 'LOCALMONTHABBREV' ),
	'localday'                  => array( '1', 'МЕТТИГАН_ДЕ', 'МЕСТНЫЙ_ДЕНЬ', 'LOCALDAY' ),
	'localday2'                 => array( '1', 'МЕТТИГАН_ДЕ_2', 'МЕСТНЫЙ_ДЕНЬ_2', 'LOCALDAY2' ),
	'localdayname'              => array( '1', 'МЕТТИГАН_ДЕ_ЦlЕ', 'НАЗВАНИЕ_МЕСТНОГО_ДНЯ', 'LOCALDAYNAME' ),
	'localyear'                 => array( '1', 'МЕТТИГАН_ШО', 'МЕСТНЫЙ_ГОД', 'LOCALYEAR' ),
	'localtime'                 => array( '1', 'МЕТТИГАН_ХАН', 'МЕСТНОЕ_ВРЕМЯ', 'LOCALTIME' ),
	'localhour'                 => array( '1', 'МЕТТИГАН_САХЬТ', 'МЕСТНЫЙ_ЧАС', 'LOCALHOUR' ),
	'numberofpages'             => array( '1', 'АГlОНИЙ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_СТРАНИЦ', 'NUMBEROFPAGES' ),
	'numberofarticles'          => array( '1', 'ЯЗЗАМАШИ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_СТАТЕЙ', 'NUMBEROFARTICLES' ),
	'numberoffiles'             => array( '1', 'ХlУМНИЙ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_ФАЙЛОВ', 'NUMBEROFFILES' ),
	'numberofusers'             => array( '1', 'ДЕКЪАШХОЙ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_УЧАСТНИКОВ', 'NUMBEROFUSERS' ),
	'numberofactiveusers'       => array( '1', 'ДУКХАЛЛА_ЖИГАРА_ДЕКЪАШХОЙ', 'КОЛИЧЕСТВО_АКТИВНЫХ_УЧАСТНИКОВ', 'NUMBEROFACTIVEUSERS' ),
	'numberofedits'             => array( '1', 'НИСДАРШИЙ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_ПРАВОК', 'NUMBEROFEDITS' ),
	'numberofviews'             => array( '1', 'ХЬАЖАРИЙ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_ПРОСМОТРОВ', 'NUMBEROFVIEWS' ),
	'pagename'                  => array( '1', 'АГlОН_ЦlЕ', 'НАЗВАНИЕ_СТРАНИЦЫ', 'PAGENAME' ),
	'pagenamee'                 => array( '1', 'АГlОН_ЦlЕ_2', 'НАЗВАНИЕ_СТРАНИЦЫ_2', 'PAGENAMEE' ),
	'namespace'                 => array( '1', 'ЦlЕРИ_АНА', 'ПРОСТРАНСТВО_ИМЁН', 'NAMESPACE' ),
	'namespacee'                => array( '1', 'ЦlЕРИ_АНА_2', 'ПРОСТРАНСТВО_ИМЁН_2', 'NAMESPACEE' ),
	'talkspace'                 => array( '1', 'ДИЙЦАРШИ_АНА', 'ПРОСТРАНСТВО_ОБСУЖДЕНИЙ', 'TALKSPACE' ),
	'talkspacee'                => array( '1', 'ДИЙЦАРШИ_АНА_2', 'ПРОСТРАНСТВО_ОБСУЖДЕНИЙ_2', 'TALKSPACEE' ),
	'subjectspace'              => array( '1', 'ЯЗЗАМАШИ_АНА', 'ПРОСТРАНСТВО_СТАТЕЙ', 'SUBJECTSPACE', 'ARTICLESPACE' ),
	'subjectspacee'             => array( '1', 'ЯЗЗАМАШИ_АНА_2', 'ПРОСТРАНСТВО_СТАТЕЙ_2', 'SUBJECTSPACEE', 'ARTICLESPACEE' ),
	'fullpagename'              => array( '1', 'ЮЬЗЗИНА_АГlОН_ЦlЕ', 'ПОЛНОЕ_НАЗВАНИЕ_СТРАНИЦЫ', 'FULLPAGENAME' ),
	'fullpagenamee'             => array( '1', 'ЮЬЗЗИНА_АГlОН_ЦlЕ_2', 'ПОЛНОЕ_НАЗВАНИЕ_СТРАНИЦЫ_2', 'FULLPAGENAMEE' ),
	'subpagename'               => array( '1', 'АГlОН_КlЕЛАРА_ЦlЕ', 'НАЗВАНИЕ_ПОДСТРАНИЦЫ', 'SUBPAGENAME' ),
	'subpagenamee'              => array( '1', 'АГlОН_КlЕЛАРА_ЦlЕ_2', 'НАЗВАНИЕ_ПОДСТРАНИЦЫ_2', 'SUBPAGENAMEE' ),
	'basepagename'              => array( '1', 'АГlОН_ЦlЕРА_БУХ', 'ОСНОВА_НАЗВАНИЯ_СТРАНИЦЫ', 'BASEPAGENAME' ),
	'basepagenamee'             => array( '1', 'АГlОН_ЦlЕРА_БУХ_2', 'ОСНОВА_НАЗВАНИЯ_СТРАНИЦЫ_2', 'BASEPAGENAMEE' ),
	'talkpagename'              => array( '1', 'ДИЙЦАРЕ_АГlОН_ЦlЕ', 'НАЗВАНИЕ_СТРАНИЦЫ_ОБСУЖДЕНИЯ', 'TALKPAGENAME' ),
	'talkpagenamee'             => array( '1', 'ДИЙЦАРЕ_АГlОН_ЦlЕ_2', 'НАЗВАНИЕ_СТРАНИЦЫ_ОБСУЖДЕНИЯ_2', 'TALKPAGENAMEE' ),
	'subjectpagename'           => array( '1', 'АГlОН_ЯЗЗАМАН_ЦlЕ', 'НАЗВАНИЕ_СТРАНИЦЫ_СТАТЬИ', 'SUBJECTPAGENAME', 'ARTICLEPAGENAME' ),
	'subjectpagenamee'          => array( '1', 'АГlОН_ЯЗЗАМАН_ЦlЕ_2', 'НАЗВАНИЕ_СТРАНИЦЫ_СТАТЬИ_2', 'SUBJECTPAGENAMEE', 'ARTICLEPAGENAMEE' ),
	'msg'                       => array( '0', 'ХААМ:', 'СООБЩЕНИЕ:', 'СООБЩ:', 'MSG:' ),
	'subst'                     => array( '0', 'ХlОТТОР:', 'ХlОТТ:', 'ПОДСТАНОВКА:', 'ПОДСТ:', 'SUBST:' ),
	'msgnw'                     => array( '0', 'ВИКИ_ХААМ_БОЦАШ:', 'СООБЩ_БЕЗ_ВИКИ:', 'MSGNW:' ),
	'img_thumbnail'             => array( '1', 'жима', 'жимо', 'мини', 'миниатюра', 'thumbnail', 'thumb' ),
	'img_manualthumb'           => array( '1', 'жима=$1', 'жимо=$1', 'мини=$1', 'миниатюра=$1', 'thumbnail=$1', 'thumb=$1' ),
	'img_right'                 => array( '1', 'бакъхьа', 'справа', 'right' ),
	'img_left'                  => array( '1', 'харцхьа', 'слева', 'left' ),
	'img_none'                  => array( '1', 'йоцуш', 'без', 'none' ),
	'img_width'                 => array( '1', '$1цинт', '$1пкс', '$1px' ),
	'img_center'                => array( '1', 'юккъ', 'центр', 'center', 'centre' ),
	'img_framed'                => array( '1', 'гурабе', 'обрамить', 'framed', 'enframed', 'frame' ),
	'img_frameless'             => array( '1', 'гурабоцаш', 'безрамки', 'frameless' ),
	'img_page'                  => array( '1', 'агlо=$1', 'агlо_$1', 'page_$1', 'страница=$1', 'страница $1', 'page=$1', 'page $1' ),
	'img_upright'               => array( '1', 'бакъхьалакхо', 'бакъхьалакхо=$1', 'бакъхьалакхо_$1', 'upright_$1', 'сверхусправа', 'сверхусправа=$1', 'сверхусправа $1', 'upright', 'upright=$1', 'upright $1' ),
	'img_border'                => array( '1', 'доза', 'граница', 'border' ),
	'img_baseline'              => array( '1', 'бух', 'основание', 'baseline' ),
	'img_sub'                   => array( '1', 'буха', 'под', 'sub' ),
	'img_super'                 => array( '1', 'тlе', 'над', 'super', 'sup' ),
	'img_top'                   => array( '1', 'лакхахь', 'сверху', 'top' ),
	'img_text_top'              => array( '1', 'лакххьара-йоза', 'текст-сверху', 'text-top' ),
	'img_middle'                => array( '1', 'юккъе', 'посередине', 'middle' ),
	'img_bottom'                => array( '1', 'бухар', 'снизу', 'bottom' ),
	'img_text_bottom'           => array( '1', 'бухара-йоза', 'текст-снизу', 'text-bottom' ),
	'img_link'                  => array( '1', 'хьажориг=$1', 'ссылка=$1', 'link=$1' ),
	'img_alt'                   => array( '1', 'альт=$1', 'alt=$1' ),
	'int'                       => array( '0', 'ЧУЬРА:', 'ВНУТР:', 'INT:' ),
	'sitename'                  => array( '1', 'МЕТТИГ_ЦlЕ', 'НАЗВАНИЕ_САЙТА', 'SITENAME' ),
	'ns'                        => array( '0', 'БО:', 'ПИ:', 'NS:' ),
	'nse'                       => array( '0', 'БОХЬ:', 'ПИК:', 'NSE:' ),
	'localurl'                  => array( '0', 'ХlОТТАЕЛЛА_МЕТТИГ:', 'ЛОКАЛЬНЫЙ_АДРЕС:', 'LOCALURL:' ),
	'localurle'                 => array( '0', 'ХlОТТАЕЛЛА_МЕТТИГ_2:', 'ЛОКАЛЬНЫЙ_АДРЕС_2:', 'LOCALURLE:' ),
	'server'                    => array( '0', 'ГlУЛКХДИРИГ', 'СЕРВЕР', 'SERVER' ),
	'servername'                => array( '0', 'ГlУЛКХДЕЧУЬНА_ЦlЕ', 'НАЗВАНИЕ_СЕРВЕРА', 'SERVERNAME' ),
	'scriptpath'                => array( '0', 'НЕКЪ_ОЦ_МЕТТАКЕПА', 'ПУТЬ_К_СКРИПТУ', 'SCRIPTPATH' ),
	'stylepath'                 => array( '0', 'ЙОМАНХАТl', 'ПУТЬ_К_СТИЛЮ', 'STYLEPATH' ),
	'grammar'                   => array( '0', 'ДОЖАР:', 'ПАДЕЖ:', 'GRAMMAR:' ),
	'gender'                    => array( '0', 'ВУ_ЙУ:', 'GENDER', 'ПОЛ:', 'GENDER:' ),
	'notitleconvert'            => array( '0', '__ХИЙЦАР_ДОЦУШ_КОЬРТЕ__', '__БЕЗ_ПРЕОБРАЗОВАНИЯ_ЗАГОЛОВКА__', '__NOTITLECONVERT__', '__NOTC__' ),
	'nocontentconvert'          => array( '0', '__ЙОЗА_ХИЙЦАР_ДОЦУШ__', '__БЕЗ_ПРЕОБРАЗОВАНИЯ_ТЕКСТА__', '__NOCONTENTCONVERT__', '__NOCC__' ),
	'currentweek'               => array( '1', 'КАРАРА_КlИР', 'ТЕКУЩАЯ_НЕДЕЛЯ', 'CURRENTWEEK' ),
	'currentdow'                => array( '1', 'КАРАРА_КlИРАН_ДЕ', 'ТЕКУЩИЙ_ДЕНЬ_НЕДЕЛИ', 'CURRENTDOW' ),
	'localweek'                 => array( '1', 'МЕТТИГЕРА_КlИРА', 'МЕСТНАЯ_НЕДЕЛЯ', 'LOCALWEEK' ),
	'localdow'                  => array( '1', 'МЕТТИГАН_КlИРАН_ДЕ', 'МЕСТНЫЙ_ДЕНЬ_НЕДЕЛИ', 'LOCALDOW' ),
	'revisionid'                => array( '1', 'ЦУЬНА_БАШХО', 'ИД_ВЕРСИИ', 'REVISIONID' ),
	'revisionday'               => array( '1', 'ДЕ_БАШХО', 'ДЕНЬ_ВЕРСИИ', 'REVISIONDAY' ),
	'revisionday2'              => array( '1', 'ДЕ_БАШХО_2', 'ДЕНЬ_ВЕРСИИ_2', 'REVISIONDAY2' ),
	'revisionmonth'             => array( '1', 'БЕТТА_БАШХО', 'МЕСЯЦ_ВЕРСИИ', 'REVISIONMONTH' ),
	'revisionyear'              => array( '1', 'ШО_БАШХО', 'ГОД_ВЕРСИИ', 'REVISIONYEAR' ),
	'revisiontimestamp'         => array( '1', 'КЪАСТАМ_ХЕНА_БАШХО', 'ОТМЕТКА_ВРЕМЕНИ_ВЕРСИИ', 'REVISIONTIMESTAMP' ),
	'revisionuser'              => array( '1', 'ДЕКЪАШХОН_БАШХО', 'ВЕРСИЯ_УЧАСНИКА', 'ВЕРСИЯ_УЧАСТНИКА', 'REVISIONUSER' ),
	'plural'                    => array( '0', 'ДУКХАЛЛИН_ТЕРАХЬ:', 'МНОЖЕСТВЕННОЕ_ЧИСЛО:', 'PLURAL:' ),
	'fullurl'                   => array( '0', 'МАЙАРРА_МЕТТИГ:', 'ПОЛНЫЙ_АДРЕС:', 'FULLURL:' ),
	'fullurle'                  => array( '0', 'МАЙАРРА_МЕТТИГ_2:', 'ПОЛНЫЙ_АДРЕС_2:', 'FULLURLE:' ),
	'lcfirst'                   => array( '0', 'ХЬАЛХАР_ЭЛП_ЖИМА:', 'ПЕРВАЯ_БУКВА_МАЛЕНЬКАЯ:', 'LCFIRST:' ),
	'ucfirst'                   => array( '0', 'ХЬАЛХАР_ЭЛП_ДОККХА:', 'ПЕРВАЯ_БУКВА_БОЛЬШАЯ:', 'UCFIRST:' ),
	'lc'                        => array( '0', 'КЕГИЙЧУ_ЭЛПАШЦА:', 'МАЛЕНЬКИМИ_БУКВАМИ:', 'LC:' ),
	'uc'                        => array( '0', 'ДАККХИЙЧУ_ЭЛПАШЦА:', 'БОЛЬШИМИ_БУКВАМИ:', 'UC:' ),
	'raw'                       => array( '0', 'ТАЙАНЗА:', 'НЕОБРАБ:', 'RAW:' ),
	'displaytitle'              => array( '1', 'ГАЙТА_КОЬРТАМОГl', 'ПОКАЗАТЬ_ЗАГОЛОВОК', 'DISPLAYTITLE' ),
	'rawsuffix'                 => array( '1', 'Т', 'Н', 'R' ),
	'newsectionlink'            => array( '1', '__ХЬАЖОРИГ_ОЦ_КЕРЛАЧУ_ДЕКЪАН__', '__ССЫЛКА_НА_НОВЫЙ_РАЗДЕЛ__', '__NEWSECTIONLINK__' ),
	'nonewsectionlink'          => array( '1', '__ЙОЦАШ_ХЬАЖОРИГ_ОЦ_КЕРЛАЧУ_ДЕКЪАН__', '__БЕЗ_ССЫЛКИ_НА_НОВЫЙ_РАЗДЕЛ__', '__NONEWSECTIONLINK__' ),
	'currentversion'            => array( '1', 'ЙОЛШЙОЛУ_БАШХО', 'ТЕКУЩАЯ_ВЕРСИЯ', 'CURRENTVERSION' ),
	'urlencode'                 => array( '0', 'ИШАРЙИНА_МЕТТИГ:', 'ЗАКОДИРОВАННЫЙ_АДРЕС:', 'URLENCODE:' ),
	'anchorencode'              => array( '0', 'ИШАРЙАР_МЕТТИГАН', 'КОДИРОВАТЬ_МЕТКУ', 'ANCHORENCODE' ),
	'currenttimestamp'          => array( '1', 'КЪАСТАМ_ЙОЛУЧУ_ХАННА', 'ОТМЕТКА_ТЕКУЩЕГО_ВРЕМЕНИ', 'CURRENTTIMESTAMP' ),
	'localtimestamp'            => array( '1', 'КЪАСТАМ_МЕТТИГА_ХАННА', 'ОТМЕТКА_МЕСТНОГО_ВРЕМЕНИ', 'LOCALTIMESTAMP' ),
	'directionmark'             => array( '1', 'ХЬАЖОЧЕ_ХААМ', 'НАПРАВЛЕНИЕ_ПИСЬМА', 'DIRECTIONMARK', 'DIRMARK' ),
	'language'                  => array( '0', '#МОТТ', '#ЯЗЫК:', '#LANGUAGE:' ),
	'contentlanguage'           => array( '1', 'МОТТ_ЧУЛАЦАМ', 'ЯЗЫК_СОДЕРЖАНИЯ', 'CONTENTLANGUAGE', 'CONTENTLANG' ),
	'pagesinnamespace'          => array( '1', 'АГlОНАШ_ОЦ_ЦlЕРАШКАХЬ:', 'СТРАНИЦ_В_ПРОСТРАНСТВЕ_ИМЁН:', 'PAGESINNAMESPACE:', 'PAGESINNS:' ),
	'numberofadmins'            => array( '1', 'АДМАНКУЬГАЛХОЙ_ДУКХАЛЛА', 'КОЛИЧЕСТВО_АДМИНИСТРАТОРОВ', 'NUMBEROFADMINS' ),
	'formatnum'                 => array( '0', 'ТЕРАХЬАН_БАРАМХlОТТОР', 'ФОРМАТИРОВАТЬ_ЧИСЛО', 'FORMATNUM' ),
	'padleft'                   => array( '0', 'ЙУЗА_ХАРЦЕ', 'ЗАПОЛНИТЬ_СЛЕВА', 'PADLEFT' ),
	'padright'                  => array( '0', 'ЙУЗА_БАКЪЕ', 'ЗАПОЛНИТЬ_СПРАВА', 'PADRIGHT' ),
	'special'                   => array( '0', 'белхан', 'гlуллакхан', 'служебная', 'special' ),
	'defaultsort'               => array( '1', 'ЛИСТАР_ЦАХЬЕХОР', 'ДОГlА_ЛИСТАРАН', 'СОРТИРОВКА_ПО_УМОЛЧАНИЮ', 'КЛЮЧ_СОРТИРОВКИ', 'DEFAULTSORT:', 'DEFAULTSORTKEY:', 'DEFAULTCATEGORYSORT:' ),
	'filepath'                  => array( '0', 'ОЦ_ХlУМАНТlЕ_НЕКЪ:', 'ПУТЬ_К_ФАЙЛУ:', 'FILEPATH:' ),
	'tag'                       => array( '0', 'къастам', 'къасто', 'къаст', 'метка', 'тег', 'тэг', 'tag' ),
	'hiddencat'                 => array( '1', '__КЪАЙЛАХЙОЛУ_КАДЕГАР__', '__СКРЫТАЯ_КАТЕГОРИЯ__', '__HIDDENCAT__' ),
	'pagesincategory'           => array( '1', 'АГlОНАШ_ОЦУ_КАДЕГАРШЧОХЬ', 'СТРАНИЦ_В_КАТЕГОРИИ', 'PAGESINCATEGORY', 'PAGESINCAT' ),
	'pagesize'                  => array( '1', 'АГlОН_БАРАМ', 'РАЗМЕР_СТРАНИЦЫ', 'PAGESIZE' ),
	'index'                     => array( '1', '__МЕТТИГТЕРАХЬ__', '__ИНДЕКС__', '__INDEX__' ),
	'noindex'                   => array( '1', '__МЕТТИГТЕРАХЬ_ЙОЦАШ__', '__БЕЗ_ИНДЕКСА__', '__NOINDEX__' ),
	'numberingroup'             => array( '1', 'ТЕРАХЬ_ОЦ_ТОБАНЦА', 'ЧИСЛО_В_ГРУППЕ', 'NUMBERINGROUP', 'NUMINGROUP' ),
	'staticredirect'            => array( '1', '__БУХЕХЬДЕРГ_ДlАСХЬАЖАЙАР__', '__СТАТИЧЕСКОЕ_ПЕРЕНАПРАВЛЕНИЕ__', '__STATICREDIRECT__' ),
	'protectionlevel'           => array( '1', 'ГlАРОЛЛИ_БАРАМ', 'УРОВЕНЬ_ЗАЩИТЫ', 'PROTECTIONLEVEL' ),
	'formatdate'                => array( '0', 'терахьибарам', 'форматдаты', 'formatdate', 'dateformat' ),
	'url_path'                  => array( '0', 'ЙОМА', 'ПУТЬ', 'PATH' ),
	'url_wiki'                  => array( '0', 'ЧЕХКА', 'ВИКИ', 'WIKI' ),
);

$messages = array(
# User preference toggles
'tog-underline' => 'Кlел сиз хьака хьажориган:',
'tog-justify' => 'Нисде йоза шораллий агlонца',
'tog-hideminor' => 'Къайладаха кигийра нисдарш оц могlама керла хийцамехь',
'tog-hidepatrolled' => 'Къайладаха гlаролладина нисдарш оц могlама керла нисдашкахь',
'tog-newpageshidepatrolled' => 'Къайлайаха гlароллайина агlонаш оц могlама керла агlонашкахь',
'tog-extendwatchlist' => 'Шорбина тlехьажарна могlам, ша беригге а хийцамаш чубогlуш, тlяхьабина боцурш а',
'tog-usenewrc' => 'Лелабе дика могlам керла чу хийцамашна (оьшу JavaScript)',
'tog-numberheadings' => 'Ша шех хlитто терахь корташна',
'tog-showtoolbar' => 'Гайта лакхара гlирсан дакъа нисйеш аттон оц тадар чохь (JavaScript)',
'tog-editondblclick' => 'Нисйе агlонаш шозза тlетаlийча (JavaScript)',
'tog-editsection' => 'Гайта хьажориг «нисйе» аьлла хlора агlона',
'tog-editsectiononrightclick' => 'Нисде дакъа шозза бакъехьар дахка тlетаlийча оцу кортан (JavaScript)',
'tog-showtoc' => 'Гойти коьртнаш (оцу агlонашна лаххара 3 коьртнашца)',
'tog-rememberpassword' => 'Даглаца сан дӀаяздар хӀокху браузеран тӀяхь (цхьан $1 {{PLURAL:$1|де|ден|динахь}})',
'tog-watchcreations' => 'Тlетоха ас кхоллина агlонаш тергаме могlам чу',
'tog-watchdefault' => 'Тlетоха ас нисйина агlонаш тергаме могlам чу',
'tog-watchmoves' => 'Тlетоха ас цlераш хийцина агlонаш тергаме могlам чу',
'tog-watchdeletion' => 'Тlетоха ас дӀаяхина агlонаш тергаме могlам чу',
'tog-minordefault' => 'Къастам бе нисйиначарн хlумцадеш кегийра долушсанна',
'tog-previewontop' => 'Чуяккха хьалххьажар рéдоккхучу кора хьалха',
'tog-previewonfirst' => 'Гайта хьалххьажар тадарш да долийча',
'tog-nocache' => 'Ма латае гойтучун къайлаха латториг',
'tog-enotifwatchlistpages' => 'Хаам бо зlе чухул, тергаме могlаман хийцамах лаьцна',
'tog-enotifusertalkpages' => 'Хаам бо зlе чухул, долахь йолу дийцаре агlон хийцамах лаьцна',
'tog-enotifminoredits' => 'Хаам бо зlе чухул, цхьа жимма а хийцамаш биняхь',
'tog-enotifrevealaddr' => 'Гайта сан зlе оцу хаамаш барехь',
'tog-shownumberswatching' => 'Гайта декъашхойн терахь, агlо латийна болу шай тергаме могlам юкъа',
'tog-oldsig' => 'Хьалххьажар долучу куьгтаlорна:',
'tog-fancysig' => 'Шен вики-къастаман куьгтаlдар (ша шех хьажориг йоцуш)',
'tog-showjumplinks' => 'Латайе гlодарна хьажоригаш «дехьа вала оцу»',
'tog-uselivepreview' => 'Лелайа чехка хьалха хьажа (JavaScript, муха ю хьажарна)',
'tog-forceeditsummary' => 'Дага даийта, нагахь нисйарх лаьцна чохь язйина яцахь',
'tog-watchlisthideown' => 'Къайлаяха ас нисйинарш оцу тергаме могlам чура',
'tog-watchlisthidebots' => 'Къайладаха шаболх бечо нисдинарш оцу тергаме могlам чура',
'tog-watchlisthideminor' => 'Къайладаха кегийра нисдарш оцу тергаме могlам чура',
'tog-watchlisthideliu' => 'Къайладаха вовзийтина болу декъашхойн нисдарш оцу тергаме могlам чура',
'tog-watchlisthideanons' => 'Къайладаха къайлаха болу декъашхойн нисдарш оцу тергаме могlам чура',
'tog-watchlisthidepatrolled' => 'Къайладаха хьаьжина волу нисдарш оцу тергаме могlам чура',
'tog-ccmeonemails' => 'Дlадахьийта суна исанна кехат, аса дохьуьйтуш долу кхечу декъашхошна.',
'tog-diffonly' => 'Ма гайта агlон чулацам шина башхонца цхьатерра йолуш',
'tog-showhiddencats' => 'Гайта къайлаха йолу категореш',
'tog-noconvertlink' => 'Хааман хьажориг кхуллу гlирс дlабайа',
'tog-norollbackdiff' => 'Юха яккхиначул тӀаьхьа ма гайта версешан башхо',
'tog-useeditwarning' => 'Хаамбе бина хийцамаш дӀаязцабеш аса болх дӀатосучу хенахь',

'underline-always' => 'Даимна',
'underline-never' => 'Цкъа а',
'underline-default' => 'Лелайа браузеран нисйарца',

# Font style option in Special:Preferences
'editfont-style' => 'Тадар чохь долу шрифт:',
'editfont-default' => 'Браузеран гӀирса чура шрифт',
'editfont-monospace' => 'Цхьатерра доцу шрифт',
'editfont-sansserif' => 'Аьтта доцу шрифт',
'editfont-serif' => 'Аьтта долу шрифт',

# Dates
'sunday' => 'кӀиран де',
'monday' => 'Оршот',
'tuesday' => 'Шинара',
'wednesday' => 'Кхаара',
'thursday' => 'Еара',
'friday' => 'ПӀераска',
'saturday' => 'Шот',
'sun' => 'КӀи',
'mon' => 'Ор',
'tue' => 'Ши',
'wed' => 'Кх',
'thu' => 'Еа',
'fri' => 'ПӀe',
'sat' => 'Шот',
'january' => 'январь',
'february' => 'февраль',
'march' => 'март',
'april' => 'апрель',
'may_long' => 'май',
'june' => 'июнь',
'july' => 'июль',
'august' => 'август',
'september' => 'сентябрь',
'october' => 'октябрь',
'november' => 'ноябрь',
'december' => 'декабрь',
'january-gen' => 'январь',
'february-gen' => 'февраль',
'march-gen' => 'март',
'april-gen' => 'апрель',
'may-gen' => 'май',
'june-gen' => 'июнь',
'july-gen' => 'июль',
'august-gen' => 'август',
'september-gen' => 'сентябрь',
'october-gen' => 'октябрь',
'november-gen' => 'ноябрь',
'december-gen' => 'декабрь',
'jan' => 'январь',
'feb' => 'февраль',
'mar' => 'март',
'apr' => 'апрель',
'may' => 'май',
'jun' => 'июнь',
'jul' => 'июль',
'aug' => 'август',
'sep' => 'сентябрь',
'oct' => 'октябрь',
'nov' => 'ноябрь',
'dec' => 'декабрь',
'january-date' => 'Январь $1',
'february-date' => 'Февраль $1',
'march-date' => 'Март $1',
'april-date' => 'Апрель $1',
'may-date' => 'Май $1',
'june-date' => 'Июнь $1',
'july-date' => 'Июль $1',
'august-date' => 'Август  $1',
'september-date' => 'Сентябрь $1',
'october-date' => 'Октябрь $1',
'november-date' => 'Ноябрь $1',
'december-date' => 'Декабрь $1',

# Categories related messages
'pagecategories' => '{{PLURAL:$1|Категори|Категореш}}',
'category_header' => 'Агlонаш оц категоречохь «$1»',
'subcategories' => 'Бухаркатегореш',
'category-media-header' => 'Файлаш оцу категори чохь «$1»',
'category-empty' => "''ХӀара категори хӀинца йаьсса ю.''",
'hidden-categories' => '{{PLURAL:$1|Къайлаха категори|Къайлаха йолу категореш}}',
'hidden-category-category' => 'Къайлаха йолу категореш',
'category-subcat-count' => '{{PLURAL:$2|ХӀокх категори чохь ю хӀокхуьна бухар категори.|{{PLURAL:$1|Гойташ $1 бухар категори|Гойту $1 бухар категореш|Гойту $1 бухар категори}} оцу $2.}}',
'category-subcat-count-limited' => 'Хlокх категори чохь {{PLURAL:$1|$1 бухар категори|$1 бухар категореша|$1 бухар категореш}}.',
'category-article-count' => '{{PLURAL:$2|ХӀокх категори чохь яц цхьа агӀо бе.|{{PLURAL:$1|Гойташ $1 агӀо|Гойту $1 агӀонаш|Гойту $1 агӀонаш}} хӀокх категорешца кху $2.}}',
'category-article-count-limited' => 'ХӀокх категори чохь {{PLURAL:$1|$1 агӀо|$1 агӀонаш|$1 агӀонаш}}.',
'category-file-count' => '{{PLURAL:$2|ХӀокх категори чохь цхьа файл бе яц.|{{PLURAL:$1|Гойта $1 файл|Гойту $1 файл|Гойту $1 файлаш}} хӀокх категорешца кху $2.}}',
'category-file-count-limited' => 'ХӀокх категори чохь {{PLURAL:$1|$1 файл|$1 файл|$1 файлаш}}.',
'listingcontinuesabbrev' => '(кхин дlа)',
'index-category' => 'Меттигтерахьйо агlонаш',
'noindex-category' => 'ДӀахьушйоцу агӀонаш',
'broken-file-category' => '{{#switch:{{NAMESPACE}}
 |{{ns:0}}=Болх цабеш файланши хьажоригаш йолу агӀонаш}}',

'linkprefix' => '/^(.*?)([a-zA-Z\\x80-\\xff]+)$/sD',

'about' => 'Цуьнах лаьцна',
'article' => 'Яззам',
'newwindow' => '(керлачу корехь)',
'cancel' => 'Цаоьшу',
'moredotdotdot' => 'Кхин дӀа…',
'morenotlisted' => 'Кхин хӀума яц',
'mypage' => 'Долахь йолу агӀо',
'mytalk' => 'Сан дийцаре агӀо',
'anontalk' => 'Дийцаре хӀокху IP-адресна',
'navigation' => 'Навигаци',
'and' => '&#32;а',

# Cologne Blue skin
'qbfind' => 'Лаха',
'qbbrowse' => 'Хьажар',
'qbedit' => 'Нисйé',
'qbpageoptions' => 'Агlо нисйар',
'qbmyoptions' => 'Хьан нисдарш',
'qbspecialpages' => 'Леррина агlонаш',
'faq' => 'СиХХ',
'faqpage' => 'Project:СиХХ',

# Vector skin
'vector-action-addsection' => 'Тlетоха хьедар',
'vector-action-delete' => 'ДӀаяккха',
'vector-action-move' => 'Цlе хийца',
'vector-action-protect' => 'Гlаролла дé',
'vector-action-undelete' => 'Меттахlоттадé',
'vector-action-unprotect' => 'ГӀароллех къаста',
'vector-simplesearch-preference' => 'Шуьйра лахаран хьехар лата де (декъа «Хьушйерг» кечйарца)',
'vector-view-create' => 'Кхоллар',
'vector-view-edit' => 'Нисйé',
'vector-view-history' => 'АгӀона хийцамаш',
'vector-view-view' => 'Éшар',
'vector-view-viewsource' => 'Билглонашка хьажа',
'actions' => 'Дийраш',
'namespaces' => 'Цlерийн ана',
'variants' => 'Кепараш',

'navigation-heading' => 'Навигацин меню',
'errorpagetitle' => 'Гlалат',
'returnto' => 'Юхагlо оцу агlоне $1.',
'tagline' => 'Гlирс хlокхуьна бу {{grammar:genitive|{{SITENAME}}}}',
'help' => 'ГӀо',
'search' => 'Лаха',
'searchbutton' => 'Лаха',
'go' => 'Дехьа хьажа',
'searcharticle' => 'Дехьа хьажа',
'history' => 'Истори',
'history_short' => 'Истори',
'updatedmarker' => 'Керла яккхина сона гинчултӀаьхьа',
'printableversion' => 'Зорба туху верси',
'permalink' => 'Даиман йолу хьажориг',
'print' => 'Зорба тоха',
'view' => 'Хьажа',
'edit' => 'Нисйé',
'create' => 'Кхолла',
'editthispage' => 'Нисйé хlара агlо',
'create-this-page' => 'Кхолла хlара агlо',
'delete' => 'ДӀаяккха',
'deletethispage' => 'ДӀаяккха хӀара агӀо',
'undeletethispage' => 'ХӀара агӀо меттахӀоттор',
'undelete_short' => 'Меттахlоттайé $1 {{PLURAL:$1|нисйинарг|нисйинарш|нисйинарш}}',
'viewdeleted_short' => 'Хьажар {{PLURAL:$1|$1 дlадаьккхина нийсдар|$1 дlадаьхна нийсдарш|$1 дlадаьхна нийсдарш}}',
'protect' => 'Гlаролла дé',
'protect_change' => 'хийца',
'protectthispage' => 'Гlаролла дé хlокху агlон',
'unprotect' => 'ГӀароллех къаста',
'unprotectthispage' => 'ГӀароллех къаста',
'newpage' => 'Керла агӀо',
'talkpage' => 'Дийцаре йила хӀара агӀо',
'talkpagelinktext' => 'Дийцаре',
'specialpage' => 'Белха агӀо',
'personaltools' => 'Долахь болу гӀирсаш',
'postcomment' => 'Керла дакъа',
'articlepage' => 'Хьажа яззаме',
'talk' => 'Дийцаре',
'views' => 'Хьажарш',
'toolbox' => 'ГӀирсаш',
'userpage' => 'Хьажа декъашхочуьна агӀоне',
'projectpage' => 'Хьажа кхолламан агӀоне',
'imagepage' => 'Хьажа файлан агӀоне',
'mediawikipage' => 'Хьагайта хааман агӀо',
'templatepage' => 'Хьажа кепа агӀоне',
'viewhelppage' => 'Схьаэца гӀо',
'categorypage' => 'Хьажа категореши агӀоне',
'viewtalkpage' => 'Хьажа дийцаре',
'otherlanguages' => 'Кхечу маттахь дерш',
'redirectedfrom' => '(ДӀасахьажийна кху $1)',
'redirectpagesub' => 'АгӀо-дӀасахьажайар',
'lastmodifiedat' => 'ХӀокху агӀон тӀаьххьаралера хийцам: $2, $1.',
'viewcount' => 'ХӀокху агӀонга хьойсина $1 {{PLURAL:$1|за|за|за}}.',
'protectedpage' => 'ГӀароллийца йолу агӀо',
'jumpto' => 'ДехьагӀо оцу:',
'jumptonavigation' => 'Навигаци',
'jumptosearch' => 'лаха',
'view-pool-error' => 'Бехк цабиллар доьха, хӀинц гӀулкхдириг йоьттина ю.
Каьчна дуккха дехарш хӀокху агӀонтӀе хьажарца.
Дехар до, собардеш а юха хьажа хӀокху агӀонтӀе жим тӀаьхьо.

$1',
'pool-timeout' => 'Блоктоха еза хан тӀех йаьлла',
'pool-queuefull' => 'Дехаршан чоь юьззина ю',
'pool-errorunknown' => 'Дойзаш доцу гlалат',

# All link text and link target definitions of links into project namespace that get used by other message strings, with the exception of user group pages (see grouppage) and the disambiguation template definition (see disambiguations).
'aboutsite' => '{{grammar:genitive|{{SITENAME}}}} лаьцна',
'aboutpage' => 'Project:Цуьнах лаьцна',
'copyright' => 'Чулацам лело мега догӀуш хиларца оцу $1.',
'copyrightpage' => '{{ns:project}}:Авторан бакъонаш',
'currentevents' => 'ХӀинцлера хилларш',
'currentevents-url' => 'Project:ХӀинцлера хилларш',
'disclaimers' => 'Бехк тӀе ца эцар',
'disclaimerpage' => 'Project:Бяхк тӀецалацар',
'edithelp' => 'ГӀо оцу тадарна',
'helppage' => 'Help:Чулацам',
'mainpage' => 'Коьрта агӀо',
'mainpage-description' => 'Коьрта агӀо',
'policy-url' => 'Project:Бакъо',
'portal' => 'Юкъараллин ков',
'portal-url' => 'Project:Юкъараллин ков',
'privacy' => 'Политика къайлаха',
'privacypage' => 'Project:Политика къайлаха',

'badaccess' => 'ТӀекхачарехь гӀалат',
'badaccess-group0' => 'Шуьга кхочуш далур дац дехарца деш дерг',
'badaccess-groups' => 'Дехарца деш дерг кхочуш далундерш бу хӀара декъашхой оцу {{PLURAL:$2|тобанашах|тобанах}} $1.',

'versionrequired' => 'Оьшу MediaWiki тайпанара $1',
'versionrequiredtext' => 'Болх бан хӀоку агӀонца оьшу MediaWiki тайпан $1. Хьажа. [[Special:Version|лелочу тайпанара башхонах лаьцна хаам]].',

'ok' => 'ХӀаъ',
'pagetitle' => '$1 — {{SITENAME}}',
'pagetitle-view-mainpage' => '{{SITENAME}}',
'retrievedfrom' => 'Хьост — «$1»',
'youhavenewmessages' => 'Хьуна кхечи $1 ($2).',
'newmessageslink' => 'керла хаамаш',
'newmessagesdifflink' => 'тӀаьххьара хийцамаш',
'youhavenewmessagesfromusers' => 'Хьуна кхачанна $1 {{PLURAL:$3|$3 декъашхочунгара|$3 декъашхошкара|$3 декъашхошкара}} ($2).',
'youhavenewmessagesmanyusers' => 'Хьона еъна $1 дукху декъашхошкар ($2).',
'newmessageslinkplural' => '{{PLURAL:$1|керла хаам}}',
'newmessagesdifflinkplural' => '{{PLURAL:$1|тӀаьхьара бина хийцамаш}}',
'youhavenewmessagesmulti' => 'Хьуна кхаьчна керла хаам оцу $1',
'editsection' => 'нисйé',
'editold' => 'нисйé',
'viewsourceold' => 'хьажа йолш йолучу ишаре',
'editlink' => 'нисйé',
'viewsourcelink' => 'хьажа йолш йолучу ишаре',
'editsectionhint' => 'Нисде дакъа: $1',
'toc' => 'Чулацам',
'showtoc' => 'гайта',
'hidetoc' => 'къайлаяккха',
'collapsible-collapse' => 'къайла яккха',
'collapsible-expand' => 'хьайаста',
'thisisdeleted' => 'Хьажа йа меттахlоттайé $1?',
'viewdeleted' => 'Хьалххьожи $1?',
'restorelink' => '{{PLURAL:$1|$1 дӀадяккхина нийсдар|$1 дӀадяхна нийсдарш|$1 дӀадяхна нийсдарш}}',
'feedlinks' => 'Оцу хатlаьхь:',
'feed-invalid' => 'Тайпан нийсадоцу талол оцу куьгтаlорна.',
'feed-unavailable' => 'Хаитарца йолу асанаш тlекхочучехь яц',
'site-rss-feed' => '$1 — RSS-аса',
'site-atom-feed' => '$1 — Atom-аса',
'page-rss-feed' => '«$1» — RSS-аса',
'page-atom-feed' => '«$1» — Atom-аса',
'feed-atom' => 'Атом',
'feed-rss' => 'RSS',
'red-link-title' => '$1 (ишта агlо йоцуш йу)',
'sort-descending' => 'Ма хийла нисяр',
'sort-ascending' => 'Ма хила нисяр',

# Short words for each namespace, by default used in the namespace tab in monobook
'nstab-main' => 'Яззам',
'nstab-user' => 'Декъашхо',
'nstab-media' => 'Медиа агӀо',
'nstab-special' => 'Белха агlо',
'nstab-project' => 'Кхолламех',
'nstab-image' => 'Файл',
'nstab-mediawiki' => 'Хаам',
'nstab-template' => 'Кеп',
'nstab-help' => 'ГӀо',
'nstab-category' => 'Категори',

# Main script and global functions
'nosuchaction' => 'Ишта дийриг дац',
'nosuchspecialpage' => 'Иштта белхан агӀо яц',
'nospecialpagetext' => '<strong>Иштта белхан агӀо яц.</strong>

Белхан агӀонашан могӀам: [[Special:SpecialPages|{{int:specialpages}}]].',

# General errors
'error' => 'Гlалат',
'databaseerror' => 'Гlалат хаамийн бухера',
'laggedslavemode' => 'Тергам бе: агӀона чохь керла йаьхинарш ца хила мега.',
'readonly' => 'Блоктоьхна дӀайаздар хаамийн бухе',
'enterlockreason' => 'Билгал де блоктохаран бахьна а и чекх йолу хан а.',
'missing-article' => 'Хlокху чохь кароезаш йолу хьан дехарца йозан агlонаш цакарийна «$1» $2.

Иштнарг наггахь хуьлу хьажориг дlайаьккхина йалхь йа хийцам бина тиша хьажоригца дехьа вала гlоьртича.

Нагахьсан гlулкх цуьнах доьзна дацахь, хьуна карийна гlирс латточехь гlалат.
Дехар до, хаам бе оцуьнах [[Special:ListUsers/sysop|куьйгалхога]], гойтуш URL.',
'missingarticle-rev' => '(верси № $1)',
'missingarticle-diff' => '(тейп тайпнара: $1, $2)',
'readonly_lag' => 'Хаамашан базина цхьана хан блоктоьхна, хаамашан базан сервераш нисялца.',
'internalerror' => 'Чоьхьара гlалат',
'internalerror_info' => 'Чоьхьара гlалат: $1',
'fileappenderrorread' => 'Тар ца дели еша «$1» тӀетухучу хенахь.',
'fileappenderror' => 'Тар ца дели тӀетоха «$1» оцунах «$2».',
'filecopyerror' => 'Йиш яц копий ян «$1» оцунах «$2».',
'filerenameerror' => 'Файлан «$1» цӀе хийца «$2» йиш яц.',
'filedeleteerror' => 'ДӀаяккха цатарло файл «$1».',
'directorycreateerror' => 'Йиш яц директори «$1» кхолла.',
'filenotfound' => 'Файл «$1» каро йиш яц.',
'fileexistserror' => 'Файл «$1» дӀаязяан йиш яц: файл йолуш ю.',
'unexpected' => 'БIегIийла йоцу маьIна: «$1»=«$2».',
'formerror' => 'ГӀалат: йиш яц хӀара формаш дӀакхачо',
'badarticleerror' => 'И хӀума кхочушъ дан йиш яц хӀокху агӀонехь.',
'cannotdelete' => 'Цатарло дӀаяккха я цӀе хийца «$1».
АгӀо хьалхо дӀаяккхина хила тарло',
'cannotdelete-title' => 'Цатарло агӀо дӀаяккха «$1»',
'badtitle' => 'Цамегаш йолу цlе',
'badtitletext' => 'Дехарца йолу агlонан цlе нийса яц, йаьсса ю, хила мега нийса ца хlоттийна меттаюкъар йа юкъарвики цlе. Хила мега, цlарца цамагош йолу саберг.',
'perfcached' => 'Лахара хаам схьаэца кэша чура цундела тӀехьарлаьра хийцамаш гойтуш бац. Кэша чохь латтаё оцул $1  кӀезиг {{PLURAL:$1|дӀаяздар|дӀаяздарш}}.',
'perfcachedts' => 'Лахара хаам схьаэца кэша чура иза тӀаьхьара карла ялла $1. Кэша чохь латта до оцул $4 кӀезиг {{PLURAL:$4|дӀаяздар|дӀаяздарш}}.',
'wrong_wfQuery_params' => 'Хилийта йиш йоцу параметраш хӀокху функцин wfQuery()<br />
Функци: $1<br />
Жоп дехар: $2',
'viewsource' => 'Хьажар',
'viewsource-title' => 'Агӏона $1 дуьххьарлера йозане хьажар',
'actionthrottled' => 'Сиххалин доза тохар',
'protectedpagetext' => 'ХӀара агӀо дӀакъойлина йу рé цадаккхийта.',
'viewsourcetext' => 'Хьоьга далундерг хьажар а дезахь хlокху агlон чура йоза хьаэцар:',
'protectedinterface' => 'ХӀара схьгайтарна гӀирса хаамаш латтош йолу агӀо ю. Куьйгалхошна бен иза хийца цало.',
'sqlhidden' => '(SQL жоп дехар къайладаккха)',
'namespaceprotected' => 'ХӀан бакъо яц анна цӀераш чохь тадарш да «$1».',
'customcssprotected' => 'Хьан бакъо яц хӀара CSS-агӀо тая, иза кхечу декъашхочун гӀерс болу дера.',
'customjsprotected' => 'Хьан бакъо яц хӀара JavaScript-агӀо тая, иза кхечу декъашхочун гӀерс болу дера.',
'mycustomcssprotected' => 'Хьан бакъо яц хӀара CSS агӀо тая.',
'mycustomjsprotected' => 'Хьан бакъо яц JavaScript агӀо тая.',
'exception-nologin' => 'Ахьа хӀой вовзийтина/йовзийтина вац/яц',

# Virus scanner
'virus-scanfailed' => 'сканиран гӀалат (код $1)',
'virus-unknownscanner' => 'йозуш йоцу антивирус:',

# Login and logout pages
'logouttext' => "'''Хьо аравела/ела.'''
Хьан йиш ю {{grammar:genitive|{{SITENAME}}}} чохь хьой ца вовзийташ/йовзийташ болх бан я <span class='plainlinks'>[$1 кхин чувала/яла ]</span> хьой чохь хила цӀарца я кхин цӀарца.
Цхьа йолу агӀонаш чохь хьо хьай цӀарца болх беш сана хила тарло ишта ца хилийта керлаякха браузеран кэш.",
'welcomeuser' => 'Марша ДогӀийла, $1!',
'yourname' => 'Декъашхочун цӀе:',
'userlogin-yourname' => 'Декъашхочун цӀе',
'userlogin-yourname-ph' => 'Язъе декъашхочун цӀе',
'yourpassword' => 'Пароль:',
'userlogin-yourpassword' => 'Пароль',
'userlogin-yourpassword-ph' => 'Язъе хьай пароль',
'createacct-yourpassword-ph' => 'Язъе пароль',
'yourpasswordagain' => 'Юха язъе пароль:',
'createacct-yourpasswordagain' => 'Бакъе пароль',
'createacct-yourpasswordagain-ph' => 'Кхин цкъа язъе пароль',
'remembermypassword' => 'Даглаца сан дӀавазвалар/ялар хӀокху гӀулкхдечу гӀирса тӀяхь (цхьан $1 {{PLURAL:$1|ден|динахь|динахь}})',
'userlogin-remembermypassword' => 'Дагахь латт ве/е со',
'userlogin-signwithsecure' => 'Ларийна цхьаьнакхетар',
'yourdomainname' => 'Хьан машан меттиг:',
'password-change-forbidden' => 'Хьан йиш яц хӀокху вики чохь пароль хийца.',
'login' => 'Системин чугӀо',
'nav-login-createaccount' => 'Вовзийта/Йовзийта хьой / дӀавазло/дӀаязло',
'loginprompt' => 'Ахьа бакъо йала йеза оцу «cookies» хьайна вовзийта лаахь гlирсан.',
'userlogin' => 'Довзийтар я декъашхочун дӀаяздар кхоллар',
'userloginnocreate' => 'Довзийта',
'logout' => 'Болх дӀаберзор',
'userlogout' => 'Болх дӀаберзор',
'notloggedin' => 'Хьо вовзийта/йовзийта гlирсан',
'userlogin-noaccount' => 'Декъашхочун дӀаяздар дац хьа?',
'userlogin-joinproject' => '{{grammar:genitive|{{SITENAME}}}} юкъахӀотта',
'nologin' => "Декъашхочун дӀаяздар дац хьа? '''$1'''.",
'nologinlink' => 'Кхолла декъашхочун дӀаяздар',
'createaccount' => 'Кхолла декъашхочун дӀаяздар',
'gotaccount' => "Дlавазвелла вуй хьо? '''$1'''.",
'gotaccountlink' => 'Довзийта',
'userlogin-resetlink' => 'Чуволу/йолу хаам биц бела?',
'userlogin-resetpassword-link' => 'Пароль кхоссар',
'helplogin-url' => 'Help:Системин довзийтар',
'userlogin-helplink' => '[[{{MediaWiki:helplogin-url}}|Системин чудаха гӀодар]]',
'createacct-join' => 'ДӀаязбе лахахь хай хаам.',
'createacct-emailrequired' => 'Электронни почтан адрес',
'createacct-emailoptional' => 'Электронни почтан адрес (ца яздича мега)',
'createacct-email-ph' => 'ДӀаязде электронни почтан адрес',
'createaccountmail' => 'хааман зӀене хула',
'createacct-realname' => 'Хьан цӀе (ца язйича мега)',
'createaccountreason' => 'Бахьан:',
'createacct-reason' => 'Бахьна',
'createacct-reason-ph' => '{{PLURAL:$1|агӀо|агӀонаш}}‎',
'createacct-captcha' => 'Кхерамзалла хьажар',
'createacct-imgcaptcha-ph' => 'ДӀаязде хьайна лакхахь гуш долу йоза',
'createacct-submit' => 'Кхолла декъашхочун дӀаяздар',
'createacct-benefit-heading' => '{{SITENAME}} кхолийна хьо санначу наха.',
'createacct-benefit-body1' => '{{PLURAL:$1|нисдар|нисдарш}}',
'createacct-benefit-body2' => '{{PLURAL:$1|яззам|яззамаш}}',
'createacct-benefit-body3' => '{{PLURAL:$1|декъашхо|декъашхой}} тӀаьхьарачу хенахь',
'badretype' => 'Ахьа язъен ишарш цхьатера яц',
'userexists' => 'Ахьа язъен декъашхочун цӀе йолуш ю, дехар до кхин цӀе харжар.',
'loginerror' => 'Гlалат ду декъашхо вовзарехь/йовзарехь',
'createacct-error' => 'ДӀаяздар кхуллуш гӀалат ду',
'createaccounterror' => 'Декъашхочун дӀаяздар кхолла йиш яц: $1',
'nocookieslogin' => '{{SITENAME}} лелош ю «cookies» декъашхой системин  чуболучу хенахь. Ахьа иш дӀайаьйина.',
'nocookiesforlogin' => '{{int:nocookieslogin}}',
'noname' => 'Ахьа магийтина йолу декъашхочун цӀе билгал йина яц.',
'loginsuccesstitle' => 'Хьан пароль тӀеэца, марша догӀила Википеди чу!',
'loginsuccess' => 'Хlинца ахьа болх бó оцу цlарца $1.',
'nosuchuser' => 'Цlарца $1 декъашхо вац/яц.
Декъашхой цlераш хаалуш йу дlайазвалрца/яларца элраш.
Нийса юьй хьажа цlе йа [[Special:UserLogin/signup|дlаяздар кхолла керла]].',
'nosuchusershort' => 'Ишта «$1» цӀе йолу декъашхо вац/яц. Хьажа цӀе нийса язйина юй.',
'nouserspecified' => 'Ахьа декъашхочун цӀе билгал ян езаш ю.',
'login-userblocked' => 'ХӀара декъашхо блоктоьхна ву/ю. Системин чувала/яла магийна дац.',
'wrongpassword' => 'Ахьа язйина йолу пароль нийса яц. Хьажа юху цхьаъз.',
'wrongpasswordempty' => 'Дехар до, язъе еса йоцу пароль.',
'mailmypassword' => 'Яийта керла пароль электронан почтехула',
'passwordremindertitle' => 'Декъашхочун {{grammar:genitive|{{SITENAME}}}}  пароль дагайаийтар',
'noemail' => 'ЦӀе $1 йолу декъашхочун электронни адрес яздина дац.',
'noemailcreate' => 'Ахьа нийса электронни почтан адрес дӀаяздан деза',
'passwordsent' => 'Керла пароль декъашхочун $1 электронни адрес тӀе дӀахьажина. Дехар до, керла пароль еъча юху системин чугӀо.',
'blocked-mailpassword' => 'Хьан IP-адрес ца тадарш дан магийна дац, цуьндела пароль меттахӀотош йолу функци блоктоьхна ю.',
'mailerror' => 'Кехат дохьуьйтуш гӀалат ду: $1',
'emailauthenticated' => 'Хьан почтан адрес бакъдина $2 $3.',
'accountcreated' => 'Дlавазвар кхоллина дели',
'accountcreatedtext' => 'Кхоллина декъашхо дlавазвар $1.',
'loginlanguagelabel' => 'Мотт: $1',

# Change password dialog
'resetpass' => 'Хийца пароль',
'resetpass_text' => '<!-- Кхузахь язъде хьай йоза -->',
'resetpass_header' => 'Хийца дӀаяздаран пароль',
'oldpassword' => 'Шираелла пароль:',
'newpassword' => 'Керла пароль:',
'retypenew' => 'Юха язъйе керла пароль:',
'resetpass_forbidden' => 'Пароль хийца йиш яц',
'resetpass-no-info' => 'ХӀара агӀо лело системин чугӀо.',
'resetpass-submit-loggedin' => 'Хийца пароль',
'resetpass-submit-cancel' => 'Цаоьшу',
'resetpass-temp-password' => 'Цхьан хана пароль:',

# Special:PasswordReset
'passwordreset' => 'Пароль кхоссар',
'passwordreset-text-many' => '{{PLURAL:$1|Пароль кхосса юза лахара цхьа меттиг.}}',
'passwordreset-legend' => 'Пароль кхоссар',
'passwordreset-username' => 'Декъашхочун цӀе:',
'passwordreset-domain' => 'Домен:',
'passwordreset-email' => 'Электронни почтан адрес:',

# Special:ChangeEmail
'changeemail' => 'Хийца электрони почт',
'changeemail-no-info' => 'ХӀара агӀо лело системин чугӀо.',
'changeemail-none' => '(яц)',
'changeemail-submit' => 'Хийца email',
'changeemail-cancel' => 'Цаоьшу',

# Edit page toolbar
'bold_sample' => 'Дерстино до йоза',
'bold_tip' => 'Дерстино до йоза',
'italic_sample' => 'Курсеттан до йоза',
'italic_tip' => 'Курсеттан до йоза',
'link_sample' => 'Хьажориган коьрта могlа',
'link_tip' => 'Чоьхьа хьажориг',
'extlink_sample' => 'http://www.example.com хьажориг корта',
'extlink_tip' => 'Арахьа хьажориг (йиц ма йе хlотталушерг http://)',
'headline_sample' => 'Йозан корта',
'headline_tip' => 'Корта 2-гlа локхаллийца',
'nowiki_sample' => 'Чудиллийша кхузе барамхlоттонза йоза.',
'nowiki_tip' => 'Тергал ца бо вики-бáрамхlоттор',
'image_sample' => 'Example.jpg',
'image_tip' => 'Чохь йолу файл',
'media_sample' => 'Example.ogg',
'media_tip' => 'Хьажориг медиа-файлан тӀе',
'sig_tip' => 'Хьан куьгтаlор аъ хlоттина хан',
'hr_tip' => 'Ана сиз (сих сиха ма леладайша)',

# Edit pages
'summary' => 'Хийцамех лаьцна:',
'subject' => 'Дlахьедар/коьрта могlа:',
'minoredit' => 'Жим хийцам',
'watchthis' => 'Латайе хlара агlо тергаме могlам юкъа',
'savearticle' => 'Дlайазъé агlо',
'preview' => 'Хьалха муха ю хьажа',
'showpreview' => 'Хьалха муха ю хьажар',
'showdiff' => 'Хlоттина болу хийцам',
'anoneditwarning' => "'''Тергам бе''': Ахьа хьай цӀарца тадарш деш дац. Хьан IP-адрес дӀаяздина хира ду хӀокху агӀон истори чу.",
'summary-preview' => 'Цуьнах лаьцна хирду:',
'blockedtitle' => 'Декъашхочун блоктоьхана',
'nosuchsectiontitle' => 'Дакъа каро йиш яц.',
'loginreqtitle' => 'Хьай цӀарца чугӀо',
'loginreqlink' => 'Логин',
'accmailtitle' => 'Пароль дlаяхьийтина.',
'accmailtext' => "Пароль декъашхочуьна [[User talk:$1|$1]], йина ша шех хитта делла чу элпашах, дlаяхийтина хьокху $2 адрес тӀе.

Чуваьлла/яла чул тӀехьа , кху гlирса чохь шуьга хийцалур ю ''[[Special:ChangePassword|шай пароль]]''.",
'newarticle' => '(Kерла)',
'newarticletext' => "Хьо веана хьажоригци хlокху агlон тlе, хlара агlо хlинца йоцаш ю.
Нагахь иза кхолла лаахь, хlотта де лахо гуш долу корехь йоза (мадарра хьажа. [[{{MediaWiki:Helppage}}|гlон агlон чу]]).
Нагахь гlалат даьлла нисвелляхь кхузе, атта тlе тlаlа йе '''юха йоккхуриг''' хьай гlирса тlяхь.",
'anontalkpagetext' => "----''Хlара дийцаре агIо къайлаха волу декъашхочуьна  ю, хlинца дӀавазвина/дӀаязйина воцуш/йоцуш, я лелош воцуш/йоцуш.
Цундела иза вовзийта/йовзийта лелош ду терахьца IP-долу метаг.
Иза терахь долу меттиг хила мега кхечу декъашхойчух терра.
Нагахь хьо къайлах волу декъашхо валахь хьайна хаам кхаьчна аьлла хеташн, хьуна хьажийна доцуш, дехар до, кхолла хьай меттиг кху чохь[[Special:UserLogin/signup|дlавазло]] йа [[Special:UserLogin|хьой вовзийта/йовзийта]],",
'noarticletext' => "Хlокх хан чохь кху агlонца йоза дац.
Шуьга далундерг [[Special:Search/{{PAGENAME}}|лахар ишта хьехош йолу цlе]] кхечу яззамашкахь,
<span class=\"plainlinks\">[{{fullurl:{{#Special:Log}}|page={{FULLPAGENAMEE}}}} лахар кхечу тептаршкахь],
йа '''[{{fullurl:{{FULLPAGENAME}}|action=edit}} кхолла ишта цlе йолу агlо]'''</span>.",
'noarticletext-nopermission' => 'ХӀокх хан чохь кху агӀонца йоза дац.
Шуьга далундерг [[Special:Search/{{PAGENAME}}|лахар ишта хьехош йолу цӀе]] кхечу яззамашкахь,
йа <span class="plainlinks">[{{fullurl:{{#Special:Log}}|page={{FULLPAGENAMEE}}}} лаха оцуьнах терадерг кхечу тептаршкахь].</span>',
'missing-revision' => 'АгӀона «{{PAGENAME}}» верси $1 яц.

Ишта хуьйла ширелла дӀайаьккхина агӀонан хьажориган дихьа делча.
Ма-дара хила мега [{{fullurl:{{#Special:Log}}/delete|page={{FULLPAGENAMEE}}}} дӀайаьхарш йолу тептар] чохь.',
'userpage-userdoesnotexist' => 'Ишта дlайазвар «<nowiki>$1</nowiki>» хlинца дац. Хьажа билгал, хьуна бакъалла лаьи кхолла йа хийцам ба хlокху агlон.',
'sitecsspreview' => "'''ХӀара хьалх хьажар ду, хӀара CSS.'''
'''хӀинца Ӏалашдина дац!'''",
'sitejspreview' => "'''ХӀара хьалх хьажар ду, хӀара JavaScript-код.'''
'''хӀинца Ӏалашйина яц!'''",
'updated' => '(Карла йаькхина)',
'note' => "'''Билгалдаккхар:'''",
'previewnote' => "'''ХӀара хьалх хьажар ду, йоза хӀинца язданза ду!'''",
'continue-editing' => 'Кхин дӀа тадар',
'session_fail_preview' => 'Сервер лара ца йира ахьа бина хийцамаш дӀаязба. Кхиъ цкъа а гӀортахь.
Нагахь санна хӀара гӀалат юха а далахь, [[Special:UserLogout|сеанс дӀа а къоьвлин]], юха а системин чувала/яла хьажа.',
'editing' => 'Тадар: $1',
'creating' => 'АгӀо кхоллар «$1»',
'editingsection' => 'Тадар $1 (дакъа)',
'editingcomment' => 'Тадар $1 (керла дакъа)',
'editconflict' => 'Тадарна дойнаш: $1',
'explainconflict' => 'Ахьа хӀара агӀо тоечу хенахь, цхьам хийцамаш бина.
Лакхарчу таяран корехь хьона гуш ду хӏинца агӏона чохь долу йоза.
Лахарчу корехь ахь бина хийцам бу.
Хьой бина хийцам лахарчу корера лакхарчу коре баккха.
Кнопкан «{{int:savearticle}}» тӏетаӏича лакхара корера йоза дӏаязлурду.',
'yourtext' => 'Хьан йоза',
'yourdiff' => 'Башхаллаш',
'copyrightwarning' => "Тергаме хьажа, массо яззаман чутухуш долу йозан хийцам хьажарехь бу, арахоьцушсанна оцу бакъойалар хьоляхь $2 (хьаж. $1).
Нагахь хьо лууш вацахь хьай йозанаш маьрша даржа а кхечаьрга хийцам байта, мадаха уьш кху чу.<br />
Ишта чlагlо йой ахьа, айхьа далош долучуьн хьо куьг да ву аьлла, йа хьаэцна цхьан
хьостера, хийцам ба а дlаса даржада а чулацам болуш.<br />
'''МАТОХИЙШ БАКЪО ЙОЦУ ГlИРСАШ КХУ ЧУ, КУЬГ ДЕ БАКЪО ЛАР ЙЕШ ЙОЛУ!'''",
'readonlywarning' => "'''ДӀАХЬЕДО. ГӀирса бух блоктоьхна оьшуш долучу хьаштан, цундера хӀинц хьоьга дӀа ца йазло хийцам.
Хила мега, ахьа Ӏалаш дан дезаш хьайн йоза, йуха тӀаьхьо леладан иза йоза.'''

Куьйгалхочо блоктоьхна гӀирса бух, цо битина кхетош хӀара хаам: $1",
'protectedpagewarning' => "'''Дlахьедар. Хlара агlо гlаролла дина ю хийцам цабайта, иза хийца йа нисйа а бакъо йолуш адаманкуьйгалла лелош болу декъашхой бе бац.'''
Лахахьа гойту хаамаш тlаьхьара бина болу хийцамна тептар чура:",
'cascadeprotectedwarning' => '<div id="cascadeprotectedwarning" style="border:1px solid #ee0; padding:10px; background:#ffa; margin-bottom:1em">[[file:Padlock.svg|left|25px|ДовгӀа|link=]]
ХӀара агӀо тада бакъо йолуш [[Project:Куьйгалхой|куьйгалхой]] бу, хӀунда аьлча и агӀо латийна кхечу агӀонашца хӀоттделлачу гӀаролле:</div>',
'templatesused' => '{{PLURAL:$1|Кеп, лелийна|Кепаш, лелош ду}} хlокху агlон башхонца:',
'templatesusedpreview' => '{{PLURAL:$1|Кеп, лелошдолу|Кепаш, лелошдолу}} оцу хьалх хьожучу агlонца:',
'template-protected' => '(гlароллийца)',
'template-semiprotected' => '(дуьззина доцуш гlаролла)',
'hiddencategories' => 'Хlара агlо чуйогlуш ю оцу $1 {{PLURAL:$1|къайлаха кадегарчу|къайлаха кадегаршчу|къайлаха кадегаршчу}}:',
'edittools' => '<!-- Кхузе буха диллина йоза гуш хир ду редоккхуче бухахь а хlума чуйоккхуче бухахь. -->',
'permissionserrors' => 'ТӀекхачарехь гӀалат',
'permissionserrorstext' => 'Хьан бакъо яц кхочуш хилийта хийцам оцу {{PLURAL:$1|шолгlа бахьанца|шолгlа бахьанашца}}:',
'permissionserrorstext-withaction' => "Хьан бакъо яц хlумда «'''$2'''» оцу {{PLURAL:$1|шолгlа бахьанца|шолгlа бахьанашца}}:",
'recreate-moveddeleted-warn' => "'''Тидам бе. Ахьа кхуллуш ю, хьалхо дӀаяккхина йолу агӀо.'''

Хьажа, билгалла оьши хьуна хӀара агӀо юха кхолла.
Лахахь далина ду дӀаяхарш тӀяхь долу тептарш а хӀокх агӀона цӀе хийцарш а.",
'moveddeleted-notice' => 'Иза агӀо дӀаяккхина яра.
Хаийтарна лахахьа гойту, цуьнца долу дӀаяздарш кху тептар чура дӀаяхарш а цӀе хийцарш а.',
'log-fulllog' => 'Хьажа деригге тептаре',
'postedit-confirmation' => 'Хьан нисдар дӏайазъдина.',

# Content models
'content-model-javascript' => 'JavaScript',
'content-model-css' => 'CSS',

# Parser/template warnings
'post-expand-template-inclusion-warning' => 'ДӀахьедар: юкъа тоьхна кепашан жамӀан барам тӀех бокха бу. Цхьайолу кепаш юкъа тухур яц.',
'post-expand-template-inclusion-category' => 'Чу дуьхкуш долу кепашан барам тӀех баьлла агӀонаш',
'post-expand-template-argument-category' => 'Кепашан аргументаш юкъахь йитина агӀонаш',
'parser-template-loop-warning' => 'Карийна кепаш юкъахь хилла шад: [[$1]]',
'parser-template-recursion-depth-warning' => 'Дозанал хьалаваьлла кlоргенца йух йуха дина кеп ($1)',

# "Undo" feature
'undo-success' => 'Нисйинарг а тlе цалаца мега. Дехар до, хьажа цхьатерра йуй башхо, тешна хила, баккъалла иза хийцам буйте хьуна безарг, тlакха тlе таlайе «дlайазйе агlо», хийцам хlотта ба.',
'undo-summary' => 'Юхадаьккхина {{GENDER:$2|декъашхочун|декъашхочун}} [[Special:Contributions/$2|$2]] ([[User talk:$2|дийц.]]) нисдар $1',

# History pages
'viewpagelogs' => 'Гайта хlокху агlонан тептар',
'currentrev-asof' => 'ХӀинцлера верси оцу $1',
'revisionasof' => 'Верси $1',
'revision-info' => 'Верси $1; $2 тӀера',
'previousrevision' => '← Хьалха йоьдург',
'nextrevision' => 'Тlаьхьайогlург →',
'currentrevisionlink' => 'Хlинцлера верси',
'cur' => 'карара.',
'next' => 'кхин',
'last' => 'хьалх.',
'page_first' => 'хьалхара',
'page_last' => 'тlаьххьара',
'histlegend' => "Кхетор: (хlинцлера.) — йолучу башхон къастам; (хьалх.) — хьалхлерачу башхон къастам; '''ж''' — жимо бозалца болу хийцам.",
'history-fieldset-title' => 'АгӀона хийцамаш',
'history-show-deleted' => 'ДӀаяхинарш',
'histfirst' => 'ширниш',
'histlast' => 'хьалхарниш',
'historysize' => '({{PLURAL:$1|1 байт|$1 байташ}})',
'historyempty' => '(йаьсса)',

# Revision feed
'history-feed-title' => 'Хийцаман истори',
'history-feed-item-nocomment' => '$1 оцу $2',

# Revision deletion
'rev-deleted-user' => '(авторан цӏе дӏаяйина)',
'rev-delundel' => 'гайта/къайла',
'rev-showdeleted' => 'гайта',
'revisiondelete' => 'ДӀаяха / меттахӀотае агӀона версеш',
'revdelete-show-file-submit' => 'Хlаъ',
'revdelete-hide-image' => 'Къайлабаккха файлан чулацам',
'revdelete-hide-user' => 'Къайлаяккха авторан цӀе',
'revdelete-radio-same' => '(ма хийца)',
'revdelete-radio-set' => 'Хlаъ',
'revdelete-radio-unset' => 'Хlахlа',
'revdelete-log' => 'Бахьан:',
'revdel-restore' => 'Хийцам бе схьагарехь',
'revdel-restore-deleted' => 'дӀааьхина версеш',
'revdel-restore-visible' => 'гуш йолу версеш',
'revdelete-reasonotherlist' => 'Кхин бахьан',

# History merging
'mergehistory-from' => 'Дуьххьарлера агӀоно',
'mergehistory-invalid-source' => 'Хьостан нийса корта хила еза.',
'mergehistory-invalid-destination' => 'Юзийна агӀона нийса корта хила еза.',
'mergehistory-reason' => 'Бахьан:',

# Merge log
'mergelog' => 'Цхьаьнатохаршан тептар',
'revertmerge' => 'Йекъа',

# Diffs
'history-title' => '$1 — хийцаман истори',
'difference-title' => '$1 — Версешан башхалла',
'lineno' => 'Могlа $1:',
'compareselectedversions' => 'Хаьржина версеш муха ю хьажа',
'showhideselectedversions' => 'Гайта/къайлайаха хаьржина башхонаш',
'editundo' => 'цаоьшу',
'diff-multi' => '({{PLURAL:$1|гайтина яц $1 юккъера верси|гайтина яц $1 юккъера версеш}} {{PLURAL:$2|$2 декъашхочун|$2 декъашхой}})',

# Search results
'searchresults' => 'Лахарна хилам',
'searchresults-title' => 'Лаха «$1»',
'searchresulttext' => 'Хlокху кхолламан агlонаш чохь лахарх лаьцна кхетош хаам, хьажа. [[{{MediaWiki:Helppage}}|нисвохааман дакъанчу]].',
'searchsubtitle' => 'Дехарца йолу «[[:$1]]» ([[Special:Prefixindex/$1|агlонаш, дlайуьлалуш йу хlо цlарца]]{{int:pipe-separator}}[[Special:WhatLinksHere/$1|тlетовжуш йу хlо цlарна]])',
'searchsubtitleinvalid' => 'Кху дехарца «$1»',
'notitlematches' => 'Агlонаши цlерашца цхьатера йогlуш яц',
'notextmatches' => 'Агlонаш чура йозанашца цхьатера йогlуш яц',
'prevn' => '{{PLURAL:$1|хьалхарниг $1|хьалхарнаш $1|хьалхарнаш $1}}',
'nextn' => '{{PLURAL:$1|тlаьхьйогlург $1|тlаьхьйогlурш $1|тlаьхьйогlурш $1}}',
'prevn-title' => '{{PLURAL:$1|Хьалхара $1 дӀаяздар|Хьалхара $1 дӀаяздарш}}',
'nextn-title' => '{{PLURAL:$1|ТӀаьхьара $1 дӀаяздар|ТӀаьхьара $1 дӀаяздарш}}',
'shown-title' => 'АгӀона чохь $1 {{PLURAL:$1|дӀаяздар|дӀаяздарш}} гайта',
'viewprevnext' => 'Хьажа ($1 {{int:pipe-separator}} $2) ($3)',
'searchmenu-legend' => 'Лахарна гlирс нисба',
'searchmenu-exists' => "'''Хlокху вики-кхолламашца йолуш ю ишта агlо «[[:$1]]»'''",
'searchmenu-new' => "'''Кхолла ишта агlо «[[:$1]]» хlокху вики-кхолламашчохь!'''",
'searchmenu-prefix' => '[[Special:PrefixIndex/$1|Гайта агlонаш ишта хlоттам болуш]]',
'searchprofile-articles' => 'Къаьстина агlонаш',
'searchprofile-project' => 'ГӀона а проектан а агӀонаш',
'searchprofile-images' => 'Мультимедиа',
'searchprofile-everything' => 'Массанхьа',
'searchprofile-advanced' => 'Шуьйра',
'searchprofile-articles-tooltip' => 'Лаха оцу $1',
'searchprofile-project-tooltip' => 'Лаха оцу $1',
'searchprofile-images-tooltip' => 'Файлаш лахар',
'searchprofile-everything-tooltip' => 'Лаха массо агlонашкахь (дийцаре агlонашцани)',
'searchprofile-advanced-tooltip' => 'Лаха дехарца хlокху ана цlерашкахь',
'search-result-size' => '$1 ({{PLURAL:$2|$2 дош|$2 дешнаш|$2 дешнаш}})',
'search-result-category-size' => '$1 {{PLURAL:$1|юкъаяр}} ($2 {{PLURAL:$2|бухара категори|бухара категореш}}, $3 {{PLURAL:$3|файл|файлаш}}).',
'search-redirect' => '(дlасахьажийна $1)',
'search-section' => '(дакъа $1)',
'search-suggest' => 'Хила мега ахьа лоьхарг: $1',
'search-interwiki-caption' => 'Гергара кхолламаш',
'search-interwiki-default' => '$1 хилам.:',
'search-interwiki-more' => '(кхин)',
'mwsuggest-disable' => 'ДӀабайа лахаран хьехам',
'searcheverything-enable' => 'Массо цIера анахь лахар',
'searchrelated' => 'хlоттаделларг',
'searchall' => 'массо',
'showingresults' => 'Лахахьа {{PLURAL:$1|гойта|гойту|гойту}} <strong>$1</strong> {{PLURAL:$1|хилам|хиламаш|хиламаш}}, дlаболало кху № <strong>$2</strong>.',
'showingresultsheader' => "{{PLURAL:$5|Хилам '''$1''' кху '''$3'''|Хиламаш '''$1 — $2''' кху '''$3'''}} оцун '''$4'''",
'nonefound' => "'''Билгалдаккхар.''' ХӀумма цадеш Ӏад йитича массо цӀеран энахь цалоху. Лела йе тӀехуттург ''all:'', лахийта массо цӀеран энахь (юкъадалош декъашхойн дийцарш а кепаш а кхин дерг.), йа хӀотта йе оьшуш йолу цӀеран эна.",
'search-nonefound' => 'Дехаре терра цхьа хӀума ца карийна.',
'powersearch' => 'Шуьйра лахар',
'powersearch-legend' => 'Шуьро лахар',
'powersearch-ns' => 'Цlераши анахь лахар:',
'powersearch-redir' => 'Схьагайта дlасахьажийнарш',
'powersearch-field' => 'Лаха',
'powersearch-togglelabel' => 'Билгалдан:',
'powersearch-toggleall' => 'Массо',
'powersearch-togglenone' => 'Хlумма цаоьшу',
'search-external' => 'Арахула лахар',
'search-error' => 'Лохуш гӀалат даьлла: $1',

# Preferences page
'preferences' => 'Гlирс нисбан',
'mypreferences' => 'ГӀирс нисбан',
'prefs-edits' => 'Нисдарши дукхалла:',
'changepassword' => 'Хийца пароль',
'prefs-skin' => 'Кечяран тема',
'skin-preview' => 'Хьалха муха ю хьажа',
'datedefault' => 'Iад йитарца',
'prefs-beta' => 'Гlоле таронаш',
'prefs-datetime' => 'Терахь а хан а',
'prefs-labs' => 'Муха ю хьажарна таронаш',
'prefs-user-pages' => 'Декъашхочун агӀо',
'prefs-personal' => 'Долахь болу хаамаш',
'prefs-rc' => 'Керла нисдарш',
'prefs-watchlist' => 'Тергаме могlам',
'prefs-watchlist-days' => 'Денойн дукхалла:',
'prefs-watchlist-days-max' => 'Къезиг  $1 {{PLURAL:$1|дена}}',
'prefs-watchlist-edits' => 'Тергаме могӀам чохь гойтучу нисдаршан максимальни дукхалла:',
'prefs-watchlist-edits-max' => 'Уггар дукха: 1000',
'prefs-watchlist-token' => 'Тергаме могӀанан токен:',
'prefs-misc' => 'Кхин гlирсаш',
'prefs-resetpass' => 'Хийца пароль',
'prefs-changeemail' => 'Хийца электрони почт',
'prefs-email' => 'Электронан почтан параметраш',
'prefs-rendering' => 'Арахьара хатl',
'saveprefs' => 'lалашдан',
'restoreprefs' => 'МеттахӀоттабе гӀирс Iад битарца',
'prefs-editing' => 'Тадар',
'rows' => 'МогӀанаш:',
'columns' => 'БӀогӀамаш:',
'searchresultshead' => 'Лаха',
'resultsperpage' => 'Карийначу дӀаяздаршан дукхалла:',
'stub-threshold' => 'Кеч яран доза <a href="#" class="stub">коьртамогӀамна хьажоригаш</a> (байташках):',
'recentchangesdays' => 'Керла нисдар гайта динахь:',
'recentchangesdays-max' => 'Къезиг  $1 {{PLURAL:$1|дена}}',
'recentchangescount' => 'Iад йитарца гойтуш долу нисдаршан дукхалла',
'prefs-help-recentchangescount' => 'Гойту керла нисдарш, агӀонашан истори, тептарш.',
'savedprefs' => 'Хьан гӀирс Ӏалашбина.',
'timezonelegend' => 'Сахьатан аса:',
'localtime' => 'Меттигера хан:',
'timezoneuseserverdefault' => 'Серверан ($1) гӀирс лелабе',
'timezoneuseoffset' => 'Кхин (билгалде дӀахилар)',
'servertime' => 'Сервера хан:',
'guesstimezone' => 'Юза браузеран чура',
'timezoneregion-asia' => 'Ази',
'timezoneregion-australia' => 'Австрали',
'timezoneregion-indian' => 'Индин океан',
'timezoneregion-pacific' => 'Тийна океан',
'allowemail' => 'Магийта декъашхошна хьайга электрони почтехула кехат кхехьийта',
'prefs-searchoptions' => 'Лаха',
'defaultns' => 'Я лаха лахахь гайтинчу аннашкахь:',
'default' => 'Iад йитарца',
'prefs-files' => 'Файлаш',
'prefs-custom-css' => 'Долахь йолу CSS',
'prefs-custom-js' => 'Долахь йолу JS',
'prefs-common-css-js' => 'Юкъара CSS/JS массо кеч даран темашан:',
'prefs-reset-intro' => 'ХӀара агӀо лело мега ахьа нисбина гӀирс Ӏад битарца юха бокхуш.
ХӀара дешдерг кхочушъ динчул  тӀехьа хьан йиш хир-яц и юха меттахӀотто.',
'prefs-emailconfirm-label' => 'Бакъ яр электрони почт:',
'youremail' => 'Кехат яздо зlе цlе:',
'username' => '{{GENDER:$1|Декъашхочун цӀе}}:',
'uid' => 'Декъашхочун {{GENDER:$1|код}}:',
'prefs-memberingroups' => '{{GENDER:$2|Тобана|Тобана}} {{PLURAL:$1|декъашхо|декъашхо}}:',
'prefs-registration' => 'ДӀаяздар кхолийна хан:',
'yourrealname' => 'Хьан бакъ цlе:',
'yourlanguage' => 'Мотт:',
'yourvariant' => 'Метта башхо',
'yournick' => 'Керла куьгтаӀор:',
'prefs-help-signature' => 'Дийцаре агӀонаш чохь къуьгтаӀо деза символшца «<nowiki>~~~~</nowiki>», цара гойтур ду хьан къуьгтаӀор а хан а.',
'yourgender' => 'Ву/Йу:',
'gender-unknown' => 'хlоттийна яц',
'gender-male' => 'борша',
'gender-female' => 'сте',
'prefs-help-gender' => 'ТӀехь доцург: и хаам лелош бу цхьайолу хаамаш чохь декъашхочун пол гучуйоккхуш.
И хаам массарна гуш хир бу.',
'email' => 'Email',
'prefs-help-email' => 'Электрони почтан адрес цахlоттийча аъ хlумма дац, амма иза оьшар ю, нагахь хьуна хьай пароль йицлахь.',
'prefs-help-email-others' => 'Кхин дӀа цо кхечу декъашхошна йиш хуьлуьйту хьога электронни кехат даийта хьан агӀона чохь йолу хьажориган гӀонца.',
'prefs-info' => 'Коьрта хаам',
'prefs-i18n' => 'Юкъардекъа мотт',
'prefs-signature' => 'КуьгтаӀор',
'prefs-dateformat' => 'Терахьан формат',
'prefs-timeoffset' => 'Хенан  гӀирс',
'prefs-advancedediting' => 'Кхин гӀирс нисбар',
'prefs-preview' => 'Хьалха муха ю хьажар',
'prefs-advancedrc' => 'Кхин гӀирс нисбар',
'prefs-advancedrendering' => 'Кхин гӀирс нисбар',
'prefs-advancedsearchoptions' => 'Кхин гӀирс нисбар',
'prefs-advancedwatchlist' => 'Кхин гӀирс нисбар',
'prefs-displayrc' => 'Гуш болу гӀирсаш',
'prefs-displaysearchoptions' => 'Гуш болу гӀирсаш',
'prefs-displaywatchlist' => 'Гуш болу гӀирсаш',
'prefs-diffs' => 'Башхон верси',

# User rights
'userrights' => 'Декъашхочун бакъона урхалладар',
'userrights-lookup-user' => 'Декъашхошан бакъонашан урхалладар',
'userrights-user-editname' => 'Язъе цӀе:',
'editusergroup' => 'Хийца декъашхочун бакъо',
'editinguser' => "Хийца декъашхочуьна бакъо '''[[User:$1|$1]]''' ([[User talk:$1|{{int:talkpagelinktext}}]]{{int:pipe-separator}}[[Special:Contributions/$1|{{int:contribslink}}]])",
'userrights-editusergroup' => 'Хийца декъашхочун бакъо',
'saveusergroups' => 'Декъашхочун бакъонаш ӏалашян',
'userrights-groupsmember' => 'Декъашхо:',
'userrights-groupsmember-auto' => 'Бакъонашан тоба:',
'userrights-groups-help' => 'Хьона хийца ло декъашхочун бакъонаш.
* Бакъона цӀера юххехь билгало елахь, цуна и бакъо йолуш ю.
* Билгало яцахь — декъашхочун и бакъо яц.
* Знако * билгала до ахьа бакъо еллачул тӀхьа хьона и дӀаяккха лур цахилар.',
'userrights-reason' => 'Бахьан:',
'userrights-no-interwiki' => 'Хьан бакъо яц декъашхой бакъо хийца кхечу википеди чохь.',
'userrights-nologin' => 'Куьйгалхочунна бакъо йолу [[Special:UserLogin|дӀаяздарца]] ло декъашхочун бакъо.',
'userrights-notallowed' => 'Хьан дӀаяздарца магийна дац декъашхошна бакъо яла а дӀаяккха а.',
'userrights-changeable-col' => 'Хьона хийца луш йолу бакъонаш',
'userrights-unchangeable-col' => 'Хьона хийца луш йоцу бакъонаш',

# Groups
'group' => 'Тоба:',
'group-user' => 'Декъашхой',
'group-autoconfirmed' => 'Ша тӀелаьцболу декъашхой',
'group-bot' => 'Шаболххой',
'group-sysop' => 'Куьйгалхой',
'group-bureaucrat' => 'Даржахой',
'group-suppress' => 'Ревизораш',
'group-all' => '(массо)',

'group-user-member' => '{{GENDER:$1|декъашхо}}',
'group-bot-member' => 'шаболххо',
'group-sysop-member' => '{{GENDER:$1|куьйгалхо}}',
'group-bureaucrat-member' => 'даржахо',
'group-suppress-member' => 'левисорхо',

'grouppage-user' => '{{ns:project}}:Декъашхой',
'grouppage-autoconfirmed' => '{{ns:project}}:Бакъонаш йолу декъашхой',
'grouppage-bot' => '{{ns:project}}:Шаболххой',
'grouppage-sysop' => '{{ns:project}}:Куьйгалхой',
'grouppage-bureaucrat' => '{{ns:project}}:Даржахой',
'grouppage-suppress' => '{{ns:project}}:Ревизораш',

# Rights
'right-edit' => 'АгӀоаш нисяр',
'right-createpage' => 'АгӀонаш кхоллар (дийцарш дац)',
'right-createtalk' => 'Дийцаре агӀонаш кхоллар',
'right-createaccount' => 'декъашхошна керла дӀаяздарш кхоллар',
'right-move' => 'АгӀонашан цӀераш хийцар',
'right-move-subpages' => 'АгӀонашан цӀераш хийцар цера бухара агӀонашцан',
'right-movefile' => 'Файланши цӀе хийцар',
'right-upload' => 'Файлаш чуйаьхар',
'right-delete' => 'агӀош дӀаяхар',
'right-bigdelete' => 'еха хийцаман истори йолу агӀонаш дӀаяхар',
'right-browsearchive' => 'ДӀаяхна агӀонаш лахар',
'right-undelete' => 'АгӀонаш меттахӀоттор',
'right-blockemail' => 'Цамагдо декъашхошка хааман кехаташ кхехьийта',
'right-unblockself' => 'ша шин блокдӀаяккхар',
'right-protect' => 'АгӀона гӀоралла хийцар а гӀоралла дина агӀо нисяр а',

# Special:Log/newusers
'newuserlogpage' => 'Декъашхой дlабазбина тептар',

# User rights log
'rightslog' => 'Декъашхочун бакъона тéптар',

# Associated actions - in the sentence "You do not have permission to X"
'action-edit' => 'нисйа хlара агlо',
'action-delete' => 'дӀаяккха хӀара агӀо',
'action-deletedhistory' => 'хӀокху агӀона дӀаяккхинцу исторега хьажар',

# Recent changes
'nchanges' => '$1 {{PLURAL:$1|хийцам|хийцамаш|хийцамаш}}',
'recentchanges' => 'Керла нисдарш',
'recentchanges-legend' => 'Гlирс нисбарна керла нисдарш',
'recentchanges-summary' => 'Лахахь гайтина хене хьаьжна Википедин агӀонашкахь тӀаьхьара бина хийцамаш',
'recentchanges-noresult' => 'Билгал йинчу хенахь цӀа хийцамаш бина бац.',
'recentchanges-feed-description' => 'Тергам бе тlаьхьара вики хийцаман хlокху ларца.',
'recentchanges-label-newpage' => 'Оцу нисдарца кхоллина керла агlо.',
'recentchanges-label-minor' => 'Хlара нисдинарг къастийна жимо долушсан',
'recentchanges-label-bot' => 'ХӀара нисдар шаболх бечо дина',
'recentchanges-label-unpatrolled' => 'ХӀара нисдар хӀинца цхьано патрулировать дина дац',
'rcnote' => "{{PLURAL:$1|Тlаьххьара '''$1''' хийцам|Тlаьххьара '''$1''' хийцамаш|Тlаьххьара '''$1''' хийцамаш}} за '''$2''' {{PLURAL:$2|де|дийнахь|дийнахь}}, оцу хан чохь $5 $4.",
'rcnotefrom' => "Лахахь гайтина тӀера '''$2''' хийцамаш ('''$1''' къезиг).",
'rclistfrom' => 'Гайта хийцам оцу $1.',
'rcshowhideminor' => '$1 кегийра нисдарш',
'rcshowhidebots' => '$1 шабелхалой',
'rcshowhideliu' => '$1 шайн цӀершца болу декъашхой',
'rcshowhideanons' => '$1 цӀе хьулйина декъашхой',
'rcshowhidepatr' => '$1 хьажжина нисдарш',
'rcshowhidemine' => '$1 айхьа нисдинарш',
'rclinks' => 'Гайта тlаьхьара $1 хийцамаш оцу $2 ден<br />$3',
'diff' => 'тейп тайпнара',
'hist' => 'истори',
'hide' => 'Къайлаяккха',
'show' => 'Гайта',
'minoreditletter' => 'ж',
'newpageletter' => 'К',
'boteditletter' => 'б',
'rc_categories_any' => 'Муьлхаа',
'newsectionsummary' => '/* $1 */ Керла хьедар',
'rc-enhanced-expand' => 'Гайта ма дарра дерг (лелош ю JavaScript)',
'rc-enhanced-hide' => 'Ма дарра дерг къайладаккха',

# Recent changes linked
'recentchangeslinked' => 'Кхуьнца долу нисдарш',
'recentchangeslinked-feed' => 'Кхуьнца долу нисдарш',
'recentchangeslinked-toolbox' => 'Кхуьнца долу нисдарш',
'recentchangeslinked-title' => 'Кхуьнца долу нисдарш $1',
'recentchangeslinked-summary' => "Хlара хийцам биначу агlонашан могlам бу, тlетовжар долуш хьагучу агlон (йа хьагойтуш йолучу категорена).
Агlонаш юькъайогlуш йолу хьан [[Special:Watchlist|тергаме могlам чохь]] '''къастийна йу'''.",
'recentchangeslinked-page' => 'Агlон цlе:',
'recentchangeslinked-to' => 'Кхечу агlор, гайта хийцамаш агlонашца, хlоттийначу агlонтlе хьажориг йолуш',

# Upload
'upload' => 'Файл чуяккхар',
'uploadbtn' => 'Файл чуяккхар',
'uploadnologintext' => 'Серверан чу файлаш яха хьо $1.',
'upload-permitted' => 'Магийна файлашан тайпанаш: $1.',
'uploadlogpage' => 'Чуйахаран тéптар',
'uploadlogpagetext' => 'Лахахьа гойтуш бу могlам тlаьххьара чуяхна файлаши. Ишта хьажа. [[Special:ImageList|файлаши могlам]] йа [[Special:NewImages|галеларе файлаши]].',
'filename' => 'Файлан цӀе',
'filedesc' => 'Файлах лаьцна',
'fileuploadsummary' => 'Файлах лаьцна:',
'filereuploadsummary' => 'Файлан хийцамаш:',
'filesource' => 'Хьост:',
'ignorewarnings' => 'ДӀахедар тергал ца дан',
'emptyfile' => 'Ахьа чуйоккхуш йолу файл еса хийла там бу. Иза гӀалат хийла мега файлан цӀе нийса язйина йоцу дела. Дехар до хьажа бакъалла и юьй ахьа чуйоккхуш йолу файл.',
'uploadwarning' => 'Дlахьедар',
'uploadedimage' => 'чуяккхина «[[$1]]»',
'overwroteimage' => 'Чуяккхина файлан керла верси «[[$1]]»',
'upload-source' => 'ДIайолалун файл',
'sourcefilename' => 'ДIайолалун файл:',
'destfilename' => 'Файлан керла цӀе:',
'upload-maxfilesize' => 'Файлан: $1 максимальни барам',
'upload-description' => 'Файлах лаьцна',
'upload-options' => 'Чуякхаран параметраш',
'watchthisupload' => 'Латайе хӀара файл тергаме могӀам юкъахь',
'filename-prefix-blacklist' => '#<!-- битийша хlара могlа ша мабарра --> <pre>
# Бухасиз шолгlа:
#  * Массо, саболчунтlийра йуьлалуш ерш «#» хуьлу хетаме дерг (могlа чекх балац)
#  * Хlора баьсса боцу могlа — хlман цlе лораш йу, терахьца сурт доккхучо луш ма хиллар
CIMG # Casio
DSC_ # Nikon
DSCF # Fuji
DSCN # Nikon
DUW # ишта цхьаболу лера гlирс а
IMG # еригге
JD # Jenoptik
MGP # Pentax
PICT # тайп тайпан
 #</pre> <!-- битийша хlара могlа ша мабарра -->',

# HTTP errors
'http-timed-out' => 'Хьежаран хан чекхели HTTP-жоп дехаран.',

'license' => 'Бакъойалар:',
'license-header' => 'Бакъойалар',
'nolicense' => 'Яц',
'upload_source_file' => ' (файл хьан компьютер чохь ю)',

# Special:ListFiles
'listfiles-summary' => 'Лахахь гойтуш ю ерриг файлаш.
Декъашхо къастичи, цун керла файлаш гойту.',
'listfiles_search_for' => 'Лаха хIуман цIарца:',
'imgfile' => 'файл',
'listfiles' => 'Файлаши могӀам',
'listfiles_date' => 'Терахь',
'listfiles_name' => 'Файлан цӀе',
'listfiles_user' => 'Декъашхо',
'listfiles_size' => 'Барам',
'listfiles_description' => 'Цуьнах лаьцна',

# File description page
'file-anchor-link' => 'Файл',
'filehist' => 'Файлан истори',
'filehist-help' => 'Тlетаlаде терахь/хан, муха хилла хьажарна и файл.',
'filehist-deleteall' => 'массо дӀаяккха',
'filehist-deleteone' => 'дӀаяккха',
'filehist-revert' => 'файл юхаерзо',
'filehist-current' => 'карара',
'filehist-datetime' => 'Терахь/Хан',
'filehist-thumb' => 'Жима',
'filehist-thumbtext' => 'Жимо башхо оцу $1',
'filehist-user' => 'Декъашхо',
'filehist-dimensions' => 'Файлан барам',
'filehist-filesize' => 'Файлан барам',
'filehist-comment' => 'Билгалдаккхар',
'imagelinks' => 'Хьажоригаш оцу файлан',
'linkstoimage' => '{{PLURAL:$1|ТӀаьхьайогӀу $1 агӀо тӀетойжина|ТӀаьхьайогӀу $1 агӀонаш тӀетойжина|ТӀаьхьайогlу $1 агӀонаш тӀетойжина}} хӀокху файлан:',
'nolinkstoimage' => 'АгӀонашчохь файл лелош яц.',
'sharedupload' => 'Хlара хlума оцун $1 чура ю иза хила мега лелош кхечу кхолламашкахь.',
'sharedupload-desc-here' => 'ХӀара файл $1 чура ю и лело йиш ю массо проекташкахь.
Цунна хаам гайтина лахахь. [$2 Файл ВикидӀайуьллучехь]',
'uploadnewversion-linktext' => 'Чуяккха керла верси хӀокху файлан',
'shared-repo-name-wikimediacommons' => 'Викидlайуллуче',

# File reversion
'filerevert' => 'Тохарлера верси юхаерзор $1',
'filerevert-legend' => 'Файлан верси юхаерзо',
'filerevert-intro' => '<span class="plainlinks">Файл юхаерзош ю \'\'\'[[Media:$1|$1]]\'\'\' оцу [$4 верси $3, $2].</span>',
'filerevert-comment' => 'Бахьан:',
'filerevert-defaultcomment' => 'Юхаерзош ю оцу $2, $1 хенахь хила верси',
'filerevert-submit' => 'Юхаяккха',
'filerevert-success' => "Юхаерзина файл '''[[Media:$1|$1]]''' оцу [$4 верси $3, $2].",

# File deletion
'filedelete-legend' => 'ДӀаяккха файл',
'filedelete-intro' => "Хьо файл '''[[Media:$1|$1]]''' дӀаяккха гӀерта цунна массо истори цхьан.",
'filedelete-comment' => 'Бахьан:',
'filedelete-submit' => 'ДӀаяккха',
'filedelete-success' => '$1 дӀаяккхи.',
'filedelete-otherreason' => 'Кхин бахьан:',
'filedelete-reason-otherlist' => 'Кхин бахьан',
'filedelete-reason-dropdown' => '* Даржина долу дӀаяккхаран баьхьанаш 
** Авторан бакъонаш талхор
** ЦхӀатера файлаш хилар',
'filedelete-edit-reasonlist' => 'Бахьанин список нисяр',

# MIME search
'mimesearch' => 'MIME хула лаха',
'mimetype' => 'MIME-тайп:',

# Unwatched pages
'unwatchedpages' => 'Цхьамо тергам ца беш йолу агIонаш',

# List redirects
'listredirects' => 'ДIасахьажоран могIам',

# Unused templates
'unusedtemplates' => 'Лелош доцу кепаш',

# Random page
'randompage' => 'Цахууш нисйелла агӀо',

# Random redirect
'randomredirect' => 'Цахууш нисделла дIасахьажор',

# Statistics
'statistics' => 'Бухехьдерг',
'statistics-header-pages' => 'Агlонашан жамlа',
'statistics-header-edits' => 'Нисдаран жамlа',
'statistics-header-users' => 'Декъашхойн жамlа',
'statistics-articles' => 'Яззамаш',
'statistics-pages' => 'Агlонаш',
'statistics-pages-desc' => 'Массо вики агlонаш, дийцаре агlонашцани, дlасахьаждарш а кхин дерш.',
'statistics-files' => 'Чуйаьхна файлаш',
'statistics-edits' => 'Нисдаран дукхалла {{grammar:genitive|{{SITENAME}}}} дlа йолайаларца',
'statistics-edits-average' => 'Йукъера агlонан нисдаран терхь',
'statistics-users' => '[[ВП:Дlаязвалар|Дlаязбелларш]] шаберигге декъашхой чохь болу [[Special:ListUsers|(могlам)]]',
'statistics-users-active' => 'Жигара декъашхой',
'statistics-users-active-desc' => 'Декъашхой, муьлха цхьа хlум дина болу, кху {{PLURAL:$1|тlаьххьара $1 динахь|тlаьххьара $1 дийнахь}}',

'disambiguations' => 'Дуккха маьIнаш долу хьажорца йолу агIонаш',
'disambiguationspage' => 'Кеп:цхьатера маьӀна доцуш',

'pageswithprop' => 'АгӀонаш цхьадолу къастамашца',
'pageswithprop-legend' => 'АгӀонаш цхьадолу къастамашца',
'pageswithprop-text' => 'Кхузахь гойтуш ю агӀонаш цхьадолу къастамаш куьйга юху билгал даьхнарш.',
'pageswithprop-prop' => 'Къастаман цӀе:',

'doubleredirects' => 'ШалгIа дIасахьажийнарш',
'double-redirect-fixed-move' => 'Агlон [[$1]] цlе хийцна, хlинца иза дlахьажийна оцу [[$2]]',

'brokenredirects' => 'ДIахаьдна долу дIасахьажораш',
'brokenredirects-edit' => 'нисйé',
'brokenredirects-delete' => 'дӀаяккха',

'withoutinterwiki' => 'Кхечу меттанашан хьажориг йоцу агIонаш',
'withoutinterwiki-submit' => 'Гайта',

'fewestrevisions' => 'ЧIогIа кIезиг башхонаш йолу агIонаш',

# Miscellaneous special pages
'nbytes' => '$1 {{PLURAL:$1|байт|байташ|байт}}',
'ncategories' => '$1 {{PLURAL:$1|категори|категореш|категореш}}',
'ninterwikis' => '$1 {{PLURAL:$1|юкъарвики-хьажориг|юкъарвики-хьажоригаш}}',
'nmembers' => '$1 {{PLURAL:$1|хӀума|хӀумнаш}}',
'nimagelinks' => 'Лелош ю $1 {{PLURAL:$1|агӀоначохь|агӀонашкахь|агӀонашкахь}}',
'ntransclusions' => 'лелош ю $1 {{PLURAL:$1|агӀоначохь|агӀонашкахь|агӀонашкахь}}',
'specialpage-empty' => 'Дехаро хӀумма ца елла.',
'lonelypages' => 'Байлахь йисина агIонаш',
'uncategorizedpages' => 'Категореш йоцу агIонаш',
'uncategorizedcategories' => 'Категореш йоцу категореш',
'uncategorizedimages' => 'Категореш йоцу файлаш',
'uncategorizedtemplates' => 'Категореш йоцу кепаш',
'unusedcategories' => 'Йаьсса категореш',
'unusedimages' => 'Лелош доцу файлаш',
'wantedcategories' => 'Оьшуш йолу категореш',
'wantedpages' => 'Оьшуш йолу агIонаш',
'wantedfiles' => 'Оьшуш йолу файлаш',
'wantedtemplates' => 'Оьшуш долу кепаш',
'mostlinked' => 'Дуккха хьажоригаш тIе тоьхна йолу агIонаш',
'mostlinkedcategories' => 'Дуккха тӀе хьажораш йолу категореш',
'mostlinkedtemplates' => 'Массарел дуккха а леладо кепаш',
'mostcategories' => 'Дуккха категореш тӀе тоьхна йолу агӀонаш',
'mostimages' => 'Массарел дуккха лелайо файлаш',
'mostinterwikis' => 'Дуккха юкъарвики хьажоригаш тӀе тоьхна йолу агӀонаш',
'mostrevisions' => 'Сих сиха нисйина йолу агIонаш',
'prefixindex' => 'Хьалха агlонашан цlераш хlотто йеза',
'prefixindex-namespace' => 'Хьалха агӀонашан цӀераш хӀотто еза («{{ns:$1}}»)',
'shortpages' => 'Боцоа яззамаш',
'longpages' => 'Беха яззамаш',
'deadendpages' => 'Дика йоцу агIонаш',
'protectedpages' => 'ГIаролла дина агIонаш',
'protectedtitles' => 'ГIаролла дина цIераш',
'listusers' => 'Декъашхой могlам',
'listusers-editsonly' => 'Цхаъ мукъане а хийцам бина декъашхой гайта',
'listusers-creationsort' => 'Кхолларан хене хьаьжна нисъяр',
'usercreated' => '{{GENDER:$3|дӀавазвелла|дӀаязелла}} $1 $2',
'newpages' => 'Керла агlонаш',
'newpages-username' => 'Декъашхо:',
'ancientpages' => 'Яззамаш оцу терахьца тӀаьххьара тадар дина долу',
'move' => 'Цlе хийца',
'movethispage' => 'Хlокху агlон цlе хийца',
'unusedimagestext' => 'Дехар до, тидаме эца, кхин йолу дуьнана машан-меттигаш а лелош хила мега нисса йогlу хьажориг (URL) хlокху хlуман, хlокху могlаме йогlуш ялахь яцахь а иза хила мега жигара лелош.',
'notargettitle' => 'Ӏалашо билгал йина яц',
'nopagetitle' => 'Ишта агӀо яц',
'nopagetext' => 'Ишта агӀо яц.',
'pager-newer-n' => '{{PLURAL:$1|алсамо керла|алсамо керланаш|алсамо керлачарех}} $1',
'pager-older-n' => '{{PLURAL:$1|алсамо шира|алсамо ширниш|алсамо ширачарех}} $1',

# Book sources
'booksources' => 'Жайнан хьосташ',
'booksources-search-legend' => 'Жайнех лаьцна хаам лахар',
'booksources-go' => 'Лаха',

# Special:Log
'specialloguserlabel' => 'Декъашхо:',
'speciallogtitlelabel' => 'Ӏалашо (цӀе я декъашхо):',
'log' => 'Тéптарш',
'all-logs-page' => 'Деригге тléкхочучéхь долу тéптарш',
'alllogstext' => 'Массо тéптар могӀам. {{SITENAME}}.
Шуьга харжалур бу хилам оцу тептаре хьаьжжина, декъашхочун цӀе (дӀаяздар диц а цадеш) я цо хьейина агӀонаш (ишта дӀаяздар а диц цадеш).',
'logempty' => 'Тептарш чохь хӀокху агӀона дӀаяздарш дац.',

# Special:AllPages
'allpages' => 'Массо агlонаш',
'alphaindexline' => 'оцу $1 кху $2',
'nextpage' => 'Тlаьхьа йогlу агlо ($1)',
'prevpage' => 'Хьалхалера агlо ($1)',
'allpagesfrom' => 'Гучé яха агlонаш, йуьлалуш йолу оцу:',
'allpagesto' => 'Арайахар сацадé оцу:',
'allarticles' => 'Массо агlонаш',
'allinnamespace' => 'Массо агlонаш оцу цlери анахь «$1»',
'allpagesnext' => 'Тlаьхьайогlурш',
'allpagessubmit' => 'Кхочушдé',
'allpagesprefix' => 'Лаха агlонаш, дlайуьлалуш йолу:',
'allpagesbadtitle' => 'Цамагош йолу агlон цlе. Коьрта могlан юкъах ю юкъарвики меттанашан юкъе тlечlагlйина йолу хьаьрк йа магийна доцу оцу коьрта моlанца сабол элп йа кхин.',
'allpages-bad-ns' => '{{SITENAME}} кху чохь ана цlераш яц «$1».',
'allpages-hide-redirects' => 'Къайлаяха дӀасахьажийнарш',

# Special:Categories
'categories' => 'Категореш',
'categoriespagetext' => '{{PLURAL:$1|Лахара категореш чохь ю|Лахара категореш чохь ю}} агӀонаш я медиа-файлаш.
Кхузахь гойтуш яц [[Special:UnusedCategories|лелош йоцу категореш]].
Кхин дӀа [[Special:WantedCategories| хийла еза категореш]].',
'categoriesfrom' => 'Гучé яха категореш, оцу:',

# Special:DeletedContributions
'deletedcontributions' => 'Декъашхочун дӀабяккхина къинхьегам',
'deletedcontributions-title' => 'ДӀабаьккхина къинхьегам',
'sp-deletedcontributions-contribs' => 'къинхьегам',

# Special:LinkSearch
'linksearch' => 'Арахьа хьажориг',
'linksearch-ok' => 'Лаха',
'linksearch-line' => '$2 — хьажориг кху $1',

# Special:ListUsers
'listusersfrom' => 'Гучé баха декъашхой, болалуш болу тӀера:',
'listusers-submit' => 'Гайта',
'listusers-noresult' => 'Декъашхой цакарий.',

# Special:ActiveUsers
'activeusers' => 'Жигар декъашхой могlам',
'activeusers-intro' => 'Лахахь гойтуш бу  {{PLURAL:$1|тӀаьхьара $1 динахь|тӀаьхьара $1 деношкахь}} хийцамаш бина декъашхой.',
'activeusers-count' => '{{PLURAL:$3|тӀаьхьарчу $3 динахь|тӀаьхьара $3 деношкахь}} $1 {{PLURAL:$1|нисдар|нисдарш}} дина',
'activeusers-from' => 'Гучé баха декъашхой, болалуш болу тӀера:',
'activeusers-hidebots' => 'Къайлабаха шабелхалой',
'activeusers-hidesysops' => 'Къайлабаха куьйгалхой',
'activeusers-noresult' => 'Декъашхой цакарий.',

# Special:ListGroupRights
'listgrouprights' => 'Декъашхойн тобанаши бакъонаш',
'listgrouprights-group' => 'Тоба',
'listgrouprights-helppage' => 'Help:Тобан бакъонаш',
'listgrouprights-members' => '(тобан могlам)',

# Email user
'emailuser' => 'Декъашхочун хааман кехат',
'emailuser-title-target' => 'Декъашхочунга кехат яздар',
'emailuser-title-notarget' => 'Декъашхочунга кехат яздар',
'defemailsubject' => 'Хаам {{grammar:genitive|{{SITENAME}}}} чура бу',
'emailusername' => 'Декъашхочун цӀе:',
'emailusernamesubmit' => 'ДӀадахьийта',
'email-legend' => '{{grammar:genitive|{{SITENAME}}}} кхечу декъашхочунга кехат дахьийтар',
'emailfrom' => 'Хьаьнгара',
'emailto' => 'Хьаьнга:',
'emailmessage' => 'Хаам:',
'emailsent' => 'Кехат дӏадахьийтина',
'emailsenttext' => 'Хьан электроннан хаам дӏабахьийтина.',

# Watchlist
'watchlist' => 'Тергаме могӀам',
'mywatchlist' => 'Тергаме могӀам',
'watchlistfor2' => 'Цунна $1 $2',
'watchlistanontext' => 'Тергаме могӀоме хьажа я тая кхочушде $1.',
'watchnologin' => 'Хьо вовзийта/йовзийта гlирсан',
'addwatch' => 'Тергаме могӀам юкъа тоха',
'addedwatchtext' => 'Хlар агlо «[[:$1]]» тlетоьхна хьан [[Special:Watchlist|тидаме могlам чу]].
Тlаьхьабогlу хийцамаш хlокх агlонна а кхунца дозуш долу дийцаре агlо а дlаяздийра ду кху могlамашкахь, ишта къастина хирду уьш шуьрочу элпашца хlокх агlон чохь [[Special:RecentChanges|керла хийцаме могlамашкахь]], бгlаьран га атту болуш.',
'removewatch' => 'ДӀаяккха тергаме могӀам юкъар',
'removedwatchtext' => 'Агlо «[[:$1]]» дlаяккхина йара хьан [[Special:Watchlist|тергаме могlам юкъар]].',
'watch' => 'Тидам бе',
'watchthispage' => 'Тергам бé хlокху агlон',
'unwatch' => 'Тергамах къаста',
'notanarticle' => 'Бац яззам',
'watchlist-details' => 'Хьан тергаме могlамца $1 {{PLURAL:$1|агlо|агlонаш|агlонаш}} ю, дийцаре агlонаша йоцуш.',
'wlheader-showupdated' => "Хийцам бина агӀонаш '''Ӏаьржа''' шрифтцан билгальяха ю.",
'wlnote' => 'Лахахьа {{PLURAL:$1|тlаьхьа богlу $1 хийцам|тlаьхьа богlу $1 хийцамаш|тlаьхьа богlу $1 хийцамаш}} хlокху {{PLURAL:$2|тlаьхьар|тlаьхьара|тlаьхьара}} <strong>$2</strong> {{plural:$2|сохьт|сохьатехь|сохьташкахь}}.',
'wlshowlast' => 'Гайта тlаьххьара $1 сахьташ $2 денош $3',
'watchlist-options' => 'Тергаме могlаман гlирс нисбар',

# Displayed when you click the "watch" button and it is in the process of watching
'watching' => 'Тергаме мlогаман юкъаяккха…',
'unwatching' => 'Тергаме мlогаман чура дlайаккха…',

'enotif_reset' => 'Билгал йаь ерриге агӀонаш хьаьжна санна',

# Delete
'deletepage' => 'ДӀаяккха агӀо',
'confirm' => 'Бакъдан',
'excontent' => 'чуьраниг: «$1»',
'excontentauthor' => 'чуьраниг: «$1» (дуьххьара кхоллина да вара иза [[Special:Contributions/$2|$2]])',
'exbeforeblank' => 'чуьраниг дlацlанйале хьалха: «$1»',
'exblank' => 'агlо йаьсса йара',
'delete-confirm' => '$1 — дӀаяккхар',
'delete-legend' => 'ДӀаяккхар',
'historywarning' => "'''Тергам:''' хӀокху агӀона герггарчу хьесапехь $1 {{PLURAL:$1|версеш|верси|верси}} ю:",
'confirmdeletetext' => "<div id=\"confirmdeletetext\">
Хьо гӀерта '''[[Википеди:АгӀонаш дӀаяхар|хӀара агӀо дӀаяккха]]'''; '''дехар до''', хьажа [[Special:Whatlinkshere/{{FULLPAGENAMEE}}|хьажориг юй кхузе хьажийна]], дӀаяккхале хьалха уьш нисйа деза.
{{#switch:{{NAMESPACE}}|{{ns:File talk}}=
<br />Хила мега, хӀара дийцаре агӀо
{{#ifexist:Media:{{PAGENAME}}
|{{#ifexist:File:{{PAGENAME}}|цигара файлан.|оц [[ВикидӀайуьллуче]]ра.}}
|йоцуш йолу файлан]]
}}
}}
</div>",
'actioncomplete' => 'Дешдерг кхочушди',
'actionfailed' => 'Кхочушъ дина дац',
'deletedtext' => '«$1» дӀаяккхина яра.
Хьажа. $2 хьажарна оцу тӀаьхьара дӀаяхначара могӀаме.',
'dellogpage' => 'ДӀадаьхнарш долу тéптар',
'dellogpagetext' => 'Лахахь гойтуш ду дӀадахаршан тептар.',
'deletionlog' => 'дӀадаьхнарш долу тéптар',
'deletecomment' => 'Бахьан:',
'deleteotherreason' => 'Кхин бахьан/тlетохар:',
'deletereasonotherlist' => 'Кхин бахьан',
'deletereason-dropdown' => '* Даржина долу дӀаяккхаран баьхьанаш 
** зулма  
** авторан лаамца
** авторан бакъонаш талхор',
'delete-edit-reasonlist' => 'Бахьанин список нисяр',

# Rollback
'rollback' => 'Юхабаккха хийцам',
'rollbacklink' => 'юхаяккха',
'rollbacklinkcount' => 'юхадаккха $1 {{PLURAL:$1|нисдар|нисдарш}}',
'rollbacklinkcount-morethan' => 'Юхадаккха $1 дукха {{PLURAL:$1|нисдар|нисдарш|нисдарш}}',
'revertpage' => 'Нисдарш [[Special:Contributions/$2|$2]] ([[User talk:$2|дийцаре]]) йуха йаьхна башхаллийн [[User:$1|$1]]',
'rollback-success' => 'Юха даьхна $1; нисдарш, $2 версен.',

# Protect
'protectlogpage' => 'Гlаролли тептар',
'protectedarticle' => 'гlаролла дина агlо «[[$1]]»',
'modifiedarticleprotection' => 'агlонан гlаролли локхалла хийцина «[[$1]]»',
'unprotectedarticle' => 'ГӀоролла дӀадаьстина «[[$1]]»',
'movedarticleprotection' => '«[[$2]]» гӀаролла сехьадаккха «[[$1]]»',
'protect-title' => 'Оцунна «$1» гӀоралла дар',
'prot_1movedto2' => '«[[$1]]» цlе хийцина оцу «[[$2]]»',
'protect-legend' => 'Бакъде гӀоралла дар',
'protectcomment' => 'Бахьан:',
'protectexpiry' => 'Чекхйолу:',
'protect_expiry_invalid' => 'Нийса йоцу хан гlаролла дlайаларехь.',
'protect_expiry_old' => 'Хан чаккхе — хьалхалера.',
'protect-unchain-permissions' => 'Схьабелла кхин гӀорралин гӀирс',
'protect-text' => "Кхузéхь хьо хьажало хийцалуш гlаролли локхалла оцу агlонашна '''$1'''.",
'protect-locked-access' => "Хьан дlаязваларéхь тоъал бакъо яц гlароллийн локхаллéхь агlон хийцам бá. Дlадоьлху хlоттийнарш оцу агlонна '''$1''':",
'protect-cascadeon' => 'Хlара агlо гlароллийца ю, хlунд аьлча иза латийна {{PLURAL:$1|лахахьа гойтучу агlонца, цуьнца хlоттийна|лахахьа гойтучу агlоншца, цаьрца хlоттийна}} чахчарийца гlаролла. Хьога хийцалур ю гlаролли локхалла хlокху агlон, амма оцо хийцам бийра бац чахчарехь йолучу гlароллийна.',
'protect-default' => 'Гlаролла йоцуш',
'protect-fallback' => 'Бакъо оьшу «$1»',
'protect-level-autoconfirmed' => 'Гlаролла дé оцу керла а дlабазбина боцучу декъашхойх',
'protect-level-sysop' => 'Куьйгалхошна бé цамагдо',
'protect-summary-cascade' => 'чахчареца',
'protect-expiring' => 'чакхйолу $1 (UTC)',
'protect-expiring-local' => 'чекхйолу $1',
'protect-expiry-indefinite' => 'хан чаккхе йоцуш',
'protect-cascade' => 'Гlаролла йé агlонаш, хlокху агlонца хlоттайелларш (чахчарé гlаролла)',
'protect-cantedit' => 'Хьéга хийцам цабало хlокху агlон гlаролли локхалан, хlуд аьлча хьан бакъо яц оцун рéдаккха.',
'protect-othertime' => 'Кхин хан:',
'protect-othertime-op' => 'кхин хан',
'protect-otherreason' => 'Кхин бахьна/тӀетохар:',
'protect-otherreason-op' => 'Кхин бахьан',
'protect-dropdown' => '* ГӀоралла дарна баьхьаш 
** сих-сиха зулам дар 
** дуккха спам хилар
** нисдаршан тӀом 
** гӀараялл агӀо',
'protect-edit-reasonlist' => 'Бахьанин список нисяр',
'protect-expiry-options' => '1 сахьт:1 hour,1 де:1 day,1 кӀиран:1 week,2 кӀиран:2 weeks,1 бутт:1 month,3 бутт:3 months,6 бутт:6 months,1 шо:1 year,цlкъа:infinite',
'restriction-type' => 'Бакъо:',
'restriction-level' => 'ТӀекхочаран локхалла:',

# Restrictions (nouns)
'restriction-edit' => 'Тадар',
'restriction-move' => 'ЦӀе хийцар',
'restriction-upload' => 'Чуйолуш',

# Restriction levels
'restriction-level-autoconfirmed' => 'дуьззина доцуш гӀаролла',
'restriction-level-all' => 'массо барам',

# Undelete
'undelete' => 'ДIайайина йолу агIонашка хьажар',
'undeletepage' => 'ДӀаяхина агӀонашка хьажар а меттахӀоттор а',
'undeletepagetitle' => "'''Лахахь гайтина хӀокху [[:$1]] агӀона дӀаяхина версеш'''.",
'viewdeletedpage' => 'ДIайайина йолу агIонашка хьажар',
'undelete-fieldset-title' => 'МеттахӀоттае версеш',
'undeleteextrahelp' => "Ерриге агӀонан истори меттахӀоттая массо а билгалонаш еса а йити '''«{{int:undeletebtn}}»''' тӀетаӀае.
ЦхӀайолу агӀонан версеш меттахӀоттая хьалха меттахӀоттош йолу версеш билгалъяьхна тӀетагӀе '''«{{int:undeletebtn}}»'''.",
'undeletehistory' => 'Агӏо меттахӏотта йича цуьнан хийцаман истори меттахӏотта ло.
Агӏо дӏаяккхинчул тӏяха юху кхолийна елахь меттахӏоттина йолу версеш гучуер ю керлачу версешна хьалха',
'undeleterevdel' => 'Метта хlоттор хира дац, нагахь иза дакъошкахь дlадайина далахь а тlаьххьара кисак башхо йа хlума.
Иштнарг хилча ахьа дlабаккха беза хlоттийна болу къастам йа хьагайта тlаьххьара дlайайина башхо.',
'undelete-revision' => 'Декъашхочун $3 дӀайаьккхина верси $1 (цу $4 $5 хан):',
'undeletebtn' => 'МеттахӀоттае',
'undeletelink' => 'хьажа/меттахӀоттае',
'undeleteviewlink' => 'хьажа',
'undeleteinvert' => 'Къастае массо',
'undeletecomment' => 'Бахьан:',
'undeletedrevisions' => '$1 {{PLURAL:$1|хийцамаш|хийцамаш|хийцамаш}} меттахӀоттайина',
'undeletedfiles' => '$1 {{PLURAL:$1|файл меттахӀоттайина|файлаш меттахӀоттайина|файлаш меттахӀоттайина}}',
'undeletedpage' => "'''МеттахӀоттайина агӀо «$1».'''

ДӀадяхнарш долу могӀане [[Special:Log/delete|тéптаре хьажа]].",
'undelete-search-submit' => 'Лаха',
'undelete-show-file-submit' => 'Хlаъ',

# Namespace form on various pages
'namespace' => 'Цlерийн ана:',
'invert' => 'Хаьржинарг хилийта',
'namespace_association' => 'Йихкина меттиг',
'blanknamespace' => '(Коьрта)',

# Contributions
'contributions' => '{{GENDER:$1|Декъашхочун}} къинхьегам',
'contributions-title' => '{{GENDER:$1|Декъашхочун}} къинхьегам $1',
'mycontris' => 'Сан къинхьегам',
'contribsub2' => 'Къинхьегам $1 ($2)',
'uctop' => ' (тlаьхьара)',
'month' => 'Беттаца (йа хьалхе):',
'year' => 'Шерачохь (я хьалхе):',

'sp-contributions-newbies' => 'Гайта бекъ къинхьегам, керла дlабазбиначара бина болу',
'sp-contributions-blocklog' => 'блоктоьхарш',
'sp-contributions-deleted' => 'дӀадяхна нийсдарш',
'sp-contributions-uploads' => 'Файлаш',
'sp-contributions-logs' => 'тéптарш',
'sp-contributions-talk' => 'дийцаре',
'sp-contributions-userrights' => 'декъашхочун бакъона урхалладар',
'sp-contributions-search' => 'Къинхьегам лахар',
'sp-contributions-username' => 'IP-адрес я декъашхочун цӀе:',
'sp-contributions-toponly' => 'ТӀаьхьара бина хийцамаш гайта',
'sp-contributions-submit' => 'Лаха',

# What links here
'whatlinkshere' => 'Хьажоригаш кхузе',
'whatlinkshere-title' => 'Агlонаш, хьажоригца оцу «$1»',
'whatlinkshere-page' => 'Агlо:',
'linkshere' => "Тlаьхьайогlу агlонаш хьажоригца ю оцу '''[[:$1]]''':",
'nolinkshere' => "ХӀокху '''[[:$1]]''' агӀона тӀе кхечу агӀонашчохь хьажоригаш яц",
'nolinkshere-ns' => "Хаьржинчу анахь яц '''[[:$1]]''' цӀе йолу агӀонаш",
'isredirect' => 'агlо-дlасахьажайар',
'istemplate' => 'лата йe',
'isimage' => 'Оцу суьртан хьажориг',
'whatlinkshere-prev' => '{{PLURAL:$1|хьалхайодарг|хьалхайодарш|хьалхайодарш}} $1',
'whatlinkshere-next' => '{{PLURAL:$1|тlаьхьайогlург|тlаьхьайогlурш|тlаьхьайогlурш}} $1',
'whatlinkshere-links' => '← хьажоригаш',
'whatlinkshere-hideredirs' => '$1 дlасахьажйар',
'whatlinkshere-hidetrans' => '$1 латораш',
'whatlinkshere-hidelinks' => '$1 хьажоригаш',
'whatlinkshere-hideimages' => '$1 файлашан хьажоригаш',
'whatlinkshere-filters' => 'Литтарш',

# Block/unblock
'block' => 'Декъашхочун блоктохар',
'unblock' => 'ДекъашхонтӀера блокдӀаякхар',
'blockip' => 'Блоктоха',
'blockip-legend' => 'Декъашхочун блоктохар',
'blockiptext' => 'Бухахь йолу форманца блоктоха IP-адресна цунтӏера дӏаяздарш ца дайта.
Блоктоха магийна цо зенаш деш делахь кхин хӏокху [[{{MediaWiki:Policy-url}}|низам ца]].
Лахахь билгалде блоктохарна бахьна.',
'ipadressorusername' => 'IP-адрес я декъашхочун цӀе:',
'ipbexpiry' => 'Хан чекхйолу:',
'ipbreason' => 'Бахьан:',
'ipbreasonotherlist' => 'Кхин бахьан',
'ipbreason-dropdown' => '* Белхан некъ дӀакъовлар бахьанаш:
** Харца хаам бар
** АгӀонан чураниг дӀаяккхар
** Спам-хьажорагаш арахьара сайташна
** МаьӀна доцу текст тӀетохар
** Декъашхой хьийзабар, кхерамаш тиссар
** Масийтта лараман яздар зуламан лелаяр
** Магитина йоцу декъашхочун цӀе',
'ipb-hardblock' => 'Шаш довзийтина болу декъашхошна бехкам бе хӀокху IP-адресца тадарш дан',
'ipbcreateaccount' => 'Цамагдо чудалар',
'ipbemailban' => 'Цамагдо декъашхошка хааман кехаташ кхехьийта',
'ipbenableautoblock' => 'Блоктоха декъашхочо лелош йолу IP-адресашна',
'ipbsubmit' => 'Блоктоха хӀокху декъашхочун/адресна',
'ipbother' => 'Кхин хан:',
'ipboptions' => '2 сахьат:2 hours,1 де:1 day,3 де:3 days,1 кlиран:1 week,2 кlиран:2 weeks,1 бутт:1 month,3 бутт:3 months,6 бутт:6 months,1 шо:1 year,цlкъа:infinite',
'ipbwatchuser' => 'ТӀетоха тергаме могӀам юкъа цуьнан долахь йолу агӀо а цуьнан дийцаре агӀо а',
'ipb-disableusertalk' => 'Цамагдо шин дийцаре агӀо та я блоктоьхна хан чекхъяллалц',
'ipb-change-block' => 'Юхаблоктоха декъашхочун оьцу хийцамашца',
'ipb-confirm' => 'Бакъде блоктохар',
'blockipsuccesssub' => 'Блоктохар чакхдели',
'blockipsuccesstext' => '[[Special:Contributions/$1|«$1»]] {{GENDER:$1|блоктоьхна ву|блоктоьхна ю}}.<br />
Хьажа. [[Special:BlockList|блоктоьхна IP-адресашан могӀам]].',
'ipb-blockingself' => 'Хьо хьайна блоктухуш ву/ю! Лууш вуй/юй хьо и кхочушдан?',
'ipb-edit-dropdown' => 'Бахьанин список нисяр',
'ipb-unblock-addr' => 'ДӀаякхаблок $1',
'ipb-unblock' => 'дӀаякхаблок декъашхонтӀера я IP-адрес тӀера',
'ipb-blocklist' => 'Блоктоьхнарш',
'ipb-blocklist-contribs' => 'Декъашхочун къинхьегам $1',
'unblockip' => 'ДӀаякхаблок декъашхонтӀера',
'unblockiptext' => 'Лелае лахара форма IP-адрес тӀера я декъашхойн дӀаяздар тӀера блокдӀайокхуш.',
'ipusubmit' => 'ДIаяккха хӀара блок',
'unblocked' => '[[User:$1|$1]] хьайаьстина.',
'blocklist' => 'Блоктоьхна декъашхой',
'ipblocklist' => 'Блоктоьхна декъашхой',
'ipblocklist-legend' => 'Блоктоьхна декъашхо лахар',
'blocklist-userblocks' => 'ДӀахьулян дӀаяздаршан блоктохарш',
'blocklist-tempblocks' => 'ДӀахьулян цхьан ханна йолу блоктохарш',
'blocklist-addressblocks' => 'ДӀахулдан цхьайолу IP адресан блоктохарш',
'blocklist-rangeblocks' => 'ДӀахьулян блоктоьхна йолу диапазонаш',
'blocklist-timestamp' => 'Терахь/хан',
'blocklist-target' => 'Ӏалашо',
'blocklist-expiry' => 'Чекхйолу',
'blocklist-by' => 'Цунна блоктоьхана куьйгалхо',
'blocklist-params' => 'Блоктохаран параметраш',
'blocklist-reason' => 'Бахьан:',
'ipblocklist-submit' => 'Лаха',
'infiniteblock' => 'хан чаккхе йоцуш',
'expiringblock' => 'чекхйолу $1 $2',
'noautoblockblock' => 'ша блоктухарг дӏаяйина',
'createaccountblock' => 'цамагдо керла дӀаяздарш кхоллар',
'blocklink' => 'блоктоха',
'unblocklink' => 'дӀаякхаблок',
'change-blocklink' => 'хийцам бе блоктохарна',
'contribslink' => 'къинхьегам',
'blocklogpage' => 'Блоктоьхарш болу тептар',
'blocklog-showlog' => '{{GENDER:$1|ХӀокху декъашхочун хьалхо блоктоьхна хила}}.
Лахахь гойту блоктохарш долу тептар:',
'blocklogentry' => 'блоктоьхна [[$1]] цхьана ханна $2 $3',
'reblock-logentry' => 'Хийцина  блоктоьхна хан [[$1]] $2 $3',
'blocklogtext' => 'Блоктохаршна а блокдӀаякхаршна а тептар. Ша блоккхеташ долу IP-адресаш кхузахь гойтуш дац. Кхин. [[Special:BlockList|хӀийнца блоктоьха берш]].',
'unblocklogentry' => 'дӀаякхинаблок $1',
'block-log-flags-anononly' => 'Къайлаха берш',
'block-log-flags-nocreate' => 'цамагдо керла дӏаяздарш кхоллар',
'block-log-flags-noautoblock' => 'ша блоктухарг дӏаяйина',
'ipb-needreblock' => 'ХӀара $1 {{GENDER:$1|блоктоьхна ву|блоктоьхна ю}}. Лаьий хьуна блоктохаран параметраш хийца?',

# Move page
'move-page' => '$1 — цlе хийцар',
'move-page-legend' => 'ЦӀe хийца яр',
'movepagetext' => "Леладан лахар хатlаьхь, хьо агlон цlе хуьйцуш ву, цхьатерра дехьа а докхуш цуьнан хийцаман тептар.
Тиша цlе хира ю дlасахьажйарехь керлачун тlе хьажийна.
Хьега далур ду ша шех дlасахьажор керла яккхар, хьалхалерачуьна метта йиллина йолу.
Нагахь ахьа иза цадинехь, дехар до, хьажа йуйла [[Special:DoubleRedirects|шалгlа]] а [[Special:BrokenRedirects|хадийначу дlасахьажориш]].
Ахьа жоп лур ду кхин дlа а хьажориг хьажийна хилийта, хила йезаче.

Тергамбеш хила, иза агlо '''хира яц''' цlе хийцина, нагахь иза цlе йолуш керла агlо йалахь, цхьа йолу хенахь, нагахь иза йалахь цхьан тlе хьажийна йа йаьсса а нисйарца истори йоцуш.
Иза бохург ду, хьега хийцалур ю оцу агlон цlе оцу цlарца, хlинц цуьна хилла йолу, нагахь ахьа гlалатонца цlе хийцанехь, йолуш йолу агlо цахууш йа мега хьа.

'''ДlАХЬЕДАР!'''
Цlе хийцарца хила тарло барамашкахь а цамётту хийцам ''гlар йойлачу'' агlонашна.
Дехар до, кхин дlа хьо вахале, дика ойла йе, хьо кхеташ хиларехь тlаьхьа хиндолучунах.",
'movepagetext-noredirectfixer' => "Бухахь йолу форманца агӀон цӀе хийцало. Цул совнах цуьна хийцаман журнал кхоьчу метте доккха. Хьалхалера цӀарахь хиръю керла кхоьллина агӀонан хьажораг.

Хьовсалаш [[Special:DoubleRedirects|шалха]] а [[Special:BrokenRedirects|йохна хьажорагаш]] юй техь аьлла.

Шу жоьпехь ду хьажорагаш нийса некъ гойтуш хиларан.

Тидам бе хьалхалера агӀон цӀе ‘’’хийцалур яц’’’ иштта цӀе йолу агӀо йолуш елахь. Юкъардаккхар: йолуш йолу агӀо кхоьчухьа хьажораг елахь, я еса елахь а, цуьна хьийцаме истори яцахь а.

И бохург ду шун агӀонан цӀе юха а хьалха хилларгчунтӀе хийца йиш ю, амма йолуш йолу агӀо дӀаяккха йиш яц.

'''ДӀАХЬЕДАР!'''

ЦӀе хийцар бахьнехь гӀаръялла агӀонашна дукха дагахь боцу хийцамаш хила тарло. Цундела цӀе хийцале шеш хила тарлучу тӀехьонашах кхета аьлла тешна хила.",
'movepagetalktext' => "Тlе хlоьттина йолу дийцаре агlо ишта цlе хийцина хира ю, '''цхьа йолу ханчохь, маца:'''

*Йаьсса йоцу дийцаре агlо йолуш ю оцу цlарца йа
*Ахьа къастаман харжам цабиняхь а къастам хlотточехь.

Ишта чу ханчохь, ахьа дехьа яккха йезар ю йа куьйга хlоттайар, нагахь иза хьашт йалахь.",
'movearticle' => 'Цle хийца хlокху агlон',
'newtitle' => 'Керла цlе',
'move-watch' => 'Латайé хlара агlо тергаме могlам юкъа',
'movepagebtn' => 'Агlон цlе хийца',
'pagemovedsub' => 'Агlон цlе хийцина',
'movepage-moved' => "'''Агlон цlе «$1» хийцина хlокху «$2»'''",
'movepage-moved-redirect' => 'Кхоьллина дӀасахьажориг.',
'movepage-moved-noredirect' => 'ДӀасхьажориг кхоллар дохина.',
'articleexists' => 'Хlарасанна цlе йолу агlо йолуш ю йа ахьа гойтуш йолу цlе магош яц.
Дехар до, харжа кхин цlе.',
'talkexists' => "'''Агlон цlе хийцина йара, амма дийцаре агlон цlе хийца цало, хlунда аьльча иза санна цlе йолу агlо йолуш ю. Дехар до, куьйга хlотта уьш.'''",
'movedto' => 'цlе хийцина оцу',
'movetalk' => 'Цуьнца йогlуш йолу дийцаре агlон цlе хийцар',
'move-subpages' => 'ЦӀeрш хийцае бухара агӀонаши ($1 кхаччалц)',
'move-talk-subpages' => 'ЦӀе хийца бухара агӀонаши а агӀонашан дийцаре а ($1  кхаччалц)',
'movepage-page-exists' => 'Агӏо $1 йолуш ю цундела и ша юху дӏаязъян йиш яц.',
'movepage-page-moved' => 'АгӀона $1 цӀе хийцина оцу $2.',
'movelogpage' => 'Цlераш хийцаран тептар',
'movesubpage' => '{{PLURAL:$1|Бухара агӀо|Бухара агӀонаш}}',
'movenosubpage' => 'ХӀокху агӀона бухара агӀонаш яц.',
'movereason' => 'Бахьан:',
'revertmove' => 'юхаяккха',
'delete_and_move' => 'Цle а хуьйцуш дӀаяккха',
'delete_and_move_text' => '== ДӀаяккха хьокъ ю ==
И цӀе йолу аг1о «[[:$1]]» йолуш ю. 
Лаьий хьуна и дӀаяккха, цӀе хийца таро хилийта?',
'delete_and_move_confirm' => 'Хlаъ, дӀаяккха хlара агlо',
'delete_and_move_reason' => 'ДӀаяккхина цӀе хийца я таро хилийта  «[[$1]]»',
'selfmove' => 'АгӀона цӏе хийца йиш яц: и цӏе хӏокху агӏона йолуш ю.',
'immobile-source-page' => 'ХӀокху агӏона цӏе хийца йиш яц.',
'move-leave-redirect' => 'Ӏадйита дӀасахьажориг',
'protectedpagemovewarning' => "'''Дlахьедар.''' Хlара агlо гlаролла йина йу; цlе хийца йа нисйа а бакъо йолуш адаманкуьйгалхой бе бац.
Лахахьа тептаро балийна тlаьхьаралера дlаязбина хаам:",
'semiprotectedpagemovewarning' => "'''Дlахьедо.''' Хlара агlо гlаролла йина йу; дlабазбиначу декъашхошка бе цlе хийцалуш яц.
Лахахьа тептаро балийна тlаьхьаралера дlаязбина хаам:",

# Export
'export' => 'АгӀонаш араяхар',
'exporttext' => 'Шуьга далур ду кхечу меттера чудахарш, йоза а хийцаме тептарш билгалла йолу агlонаш йа гулдина йолу агlонаш хlокх XML барамца, йуха тlяхьа чура [[Special:Import|хьаэцалурдолш]] кхечу вики-хьалхен, болх беш йолу хlокху MediaWiki гlирсаца.

Кхечу меттера яззамаш чуйаха, чуязйе цlе редокхчу метте, цlхьа могlан цlе могlаршкахь, йуха харжа лаьи шуна Кхечу меттер чуйаха массо яззамашна истори хийцамбарш йа тlяхьаралера яззамна башхо.

Шуьга кхи даландерг, лелаеш йолу меттиг къастаман машан хьажориг кхечу меттер чудаха тlяхьарлера башхон яззамаш. Массала оцу яззамна [[{{MediaWiki:Mainpage}}]] хlара хира йу хьажориг [[{{#Special:Export}}/{{MediaWiki:Mainpage}}]].',
'exportcuronly' => 'Карара верси бен юкъа ма тоха, юзийна хьалхалерра истори йоцуш',
'export-submit' => 'Экспорт ян',
'export-addcattext' => 'ТӀетоха агӀонаш категори чура:',
'export-download' => 'Кховда де файл сана Ӏалашдан',
'export-templates' => 'Латадé кепаш',

# Namespace 8 related
'allmessages' => 'Гlирса хаамаш',
'allmessagesname' => 'Хаам',
'allmessagesdefault' => 'Шаьшха йоза',
'allmessagescurrent' => 'Карарчу хенан йоза',
'allmessages-filter-legend' => 'Литтар',
'allmessages-filter' => 'Литтар оцу хьола хийцамца:',
'allmessages-filter-unmodified' => 'Хийцан йоцурш',
'allmessages-filter-all' => 'Массо',
'allmessages-filter-modified' => 'Хийцнарш',
'allmessages-prefix' => 'Литтар оцу дешахьалхе:',
'allmessages-language' => 'Мотт:',
'allmessages-filter-submit' => 'Дехьа вала',

# Thumbnails
'thumbnail-more' => 'Доккха де',
'thumbnail_error' => 'Миниатюра кхолларна гӀалат: $1',

# Special:Import
'import' => 'АгӀонаш чуяхар',
'import-interwiki-source' => 'Вики-хьост/агlо:',
'import-interwiki-templates' => 'Лата де массо кепаш',
'import-upload-filename' => 'Файлан цӀе:',
'importnosources' => 'Юкъаравики-импортан хьост хаьржина яцара, дуьхьала хийцамашан истори чуяккхар дӀадайина ду.',

# Import log
'importlogpage' => 'Импортан тептар',

# Tooltip help for the actions
'tooltip-pt-userpage' => 'Декъашхочуьна агlо',
'tooltip-pt-mytalk' => 'Сан дийцаре агlо',
'tooltip-pt-preferences' => 'Хьан гlирс нисбар',
'tooltip-pt-watchlist' => 'Ахьа тергам бо агlонаши хийцаман могlам',
'tooltip-pt-mycontris' => 'Хьан нисдаран могlам',
'tooltip-pt-login' => 'Хlокху гlирса чохь дlавазвала/яла мега, амма иза тlедожош дац.',
'tooltip-pt-logout' => 'Дlадерзадо болх бар',
'tooltip-ca-talk' => 'Дийцаре агlон чулацам',
'tooltip-ca-edit' => 'Хlара агlо хийцалур ю. Лелайе, дехар до, хьалххьажар айхьа чутохале lалашан',
'tooltip-ca-addsection' => 'Кхолла керла дакъа',
'tooltip-ca-viewsource' => 'Хlара агlо хийцам цабайта гароллехь ю, хьоьга далундерг хьажар а дезахь чура йоза хьаэцар',
'tooltip-ca-history' => 'Хlокху агlон хийцамаш болу тептар',
'tooltip-ca-protect' => 'Гlаролла дé хlокху агlон хийцам цабайта',
'tooltip-ca-unprotect' => 'Дlадаккха хlокху агlонна долу гаролла',
'tooltip-ca-delete' => 'ДӀаяккха хӀара агӀо',
'tooltip-ca-move' => 'Агlон цlе хийца',
'tooltip-ca-watch' => 'Тlетоха хlара агlо сан тергаме могlам юкъа',
'tooltip-ca-unwatch' => 'Дlайаккха хlара агlо хьай тергаме могlам юкъар',
'tooltip-search' => 'Лаха иза дош',
'tooltip-search-go' => 'Билгала и санна цlе йолучу агlон чу дехьа вала',
'tooltip-search-fulltext' => 'Лаха агlонаш ше чулацамехь хlара йоза долуш',
'tooltip-p-logo' => 'Коьрта агIо',
'tooltip-n-mainpage' => 'Дехьавалар коьрта агlончу',
'tooltip-n-mainpage-description' => 'Дехьавалар коьрта агlончу',
'tooltip-n-portal' => 'Оцу кхолламах, мичахь хlу йу лаьташ а хlудалур ду шуьга',
'tooltip-n-currentevents' => 'Дlаоьхуш болу хаамашна могlам',
'tooltip-n-recentchanges' => 'Тlаьххьаралера хийцаман могlам',
'tooltip-n-randompage' => 'Хьажа цахууш нисйеллачу агlоне',
'tooltip-n-help' => 'Нисвохаамаш оцу кхолламца «{{SITENAME}}»',
'tooltip-t-whatlinkshere' => 'Массо агlон могlам, хlокху агlонтlе хьажийна йолу',
'tooltip-t-recentchangeslinked' => 'Тlаьхьарлера хийцамаш хlокху агlонашкахь, мичхьа хьажийна хlара агlо',
'tooltip-feed-rss' => 'Хьагайтар оцу RSS цани хlокху агlон',
'tooltip-feed-atom' => 'Хьагайтар оцу Atom цани хlокху агlон',
'tooltip-t-contributions' => 'Хlокху декъашхочо хийцина йолу агlонашан могlам',
'tooltip-t-emailuser' => 'Дlабахьийта хаам оцу декъашхона',
'tooltip-t-upload' => 'Чуйаха файлаш',
'tooltip-t-specialpages' => 'Белха агlонаши могlам',
'tooltip-t-print' => 'Хlокху агlонна зорба туху башхо',
'tooltip-t-permalink' => 'Даимна йолу хьажориг хlокху башха агlонна',
'tooltip-ca-nstab-main' => 'Яззамна чулацам',
'tooltip-ca-nstab-user' => 'ХӀора декъашхочун долахь йолу агӀо ю',
'tooltip-ca-nstab-media' => 'Медиа-файл',
'tooltip-ca-nstab-special' => 'Хlара белха агlо йу, хlара рéдаккхалуш яц',
'tooltip-ca-nstab-project' => 'Кхолламан дакъа',
'tooltip-ca-nstab-image' => 'Хlуман агlо',
'tooltip-ca-nstab-mediawiki' => 'Хааман агlо MediaWiki',
'tooltip-ca-nstab-template' => 'Куцкепа агlо',
'tooltip-ca-nstab-category' => 'Категореши агӀо',
'tooltip-minoredit' => 'Къастам бé хlокху хийцамна кlеззиг боуш санна',
'tooltip-save' => 'Хьан хийцамаш lалашбой',
'tooltip-preview' => 'Дехар до, агlо lалаш йарал хьалха хьажа муха йу яз!',
'tooltip-diff' => 'Гайта долуш долу йозанах бина болу хийцам.',
'tooltip-compareselectedversions' => 'Хlокху шина хаьржина агlона башхо муха ю хьажа.',
'tooltip-watch' => 'Тlетоха хlара агlо сан тергаме могlам юкъа',
'tooltip-rollback' => 'Цхьоз тlетаlийча дlабаккха кхечо бина болу тlаьххьара хийцам',
'tooltip-undo' => 'Дlабаккха бина болу хийцам а хьалхьажар гойтуш, дlайаккхарна бахьан гайта аьтту беш',
'tooltip-summary' => 'Язъе йоца цӀе',

# Stylesheets
'common.css' => '/** Чуйиллина йолу кхузе CSS хир йу лелош масхьа кечйечу чохь */',
'monobook.css' => '/* Чуйиллина йолу кхузе CSS хир йу лелош масхьа Monobook чохь */',
'print.css' => '/* Чуйиллина йолу кхузе CSS хир йу лелош масхьа зорба тухучуче чохь */',

# Scripts
'common.js' => '/* Чуйиллина йолу кхузе JavaScript код гучу ера ю массо декъашхошна оцара схьаелларца хlора агlо */',
'monobook.js' => '/* Кхузе чу язийна йолу JavaScript код, чу ера ю, массо MonoBook хатl лелош болу декъашхошна */',

# Attribution
'siteuser' => 'декъашхо {{grammar:genitive|{{SITENAME}}}} $1',
'others' => 'кхин',
'siteusers' => '{{PLURAL:$2|декъашхо|декъашхой}} {{grammar:genitive|{{SITENAME}}}} $1',
'anonusers' => '{{PLURAL:$2|цӀе хьулйина декъашхо|цӀе хьулйина декъашхой}} {{grammar:genitive|{{SITENAME}}}} $1',
'nocredits' => 'Бац декъашхойн могlам хlокху яззамца',

# Spam protection
'spamprotectiontitle' => 'Совбиларна литтар',

# Info page
'pageinfo-header-basic' => 'Коьрта хаам',
'pageinfo-language' => 'АгӀона мотт',
'pageinfo-toolboxlink' => 'Агlонах болу бовзам',

# Skin names
'skinname-cologneblue' => 'Кёльнин сингаттам',
'skinname-modern' => 'Кхузаманан',
'skinname-vector' => 'Векторни',

# Patrolling
'markaspatrolledtext' => 'Пайден агӏо хилар билгало ян',
'markedaspatrollednotify' => 'АгӀо «$1» пайдане хилар билгалдина',

# Patrol log
'patrol-log-page' => 'ТӀехьажаран тептар',
'log-show-hide-patrol' => '$1 тӀехьажаран тептар',

# Browsing diffs
'previousdiff' => '← Хьалхдоьда нисдинарг',
'nextdiff' => 'Тlяхьа догlа нисдинарг →',

# Media information
'imagemaxsize' => "Суьртан бараман доза тохар:<br />''(Файла агӀона куц дийцар)''",
'thumbsize' => 'Жима дина суьртан барам:',
'widthheightpage' => '$1 × $2, $3 {{PLURAL:$3|агlо|агlонаш|агlонаш}}',
'file-info' => 'файлан барам: $1, MIME-тайп: $2',
'file-info-size' => '$1 × $2 {{PLURAL:$2|пиксель|пикселш}}, файлан барам: $3, MIME-тайп: $4',
'file-info-size-pages' => '$1 × $2 пикселш, файлан барам: $3, MIME-тайп: $4, $5 {{PLURAL:$5|агӀо|агӀонаш}}',
'file-nohires' => 'Кхи йоккха гlоле башхо яц.',
'svg-long-desc' => 'SVG-файл, лартӀахь ю $1 × $2 {{PLURAL:$2|пиксель|пикселш|пикселш}}, файлан барам: $3',
'svg-long-desc-animated' => 'Анимироват йина SVG-файл, номинальни $1 × $2 {{PLURAL:$2|пиксель|пикселш}}, файлан барам: $3',
'show-big-image' => 'Сурт цlанал лаккхара бакъонца',
'show-big-image-preview' => 'Барам хьажале: $1.',
'show-big-image-other' => '{{PLURAL:$2|Кхин шоралла|Кхин шоралла}}: $1.',
'show-big-image-size' => '$1 × $2 пикселш',

# Special:NewFiles
'newimages' => 'Керлачу файланшан галерий',
'newimages-summary' => 'ХӀокху белхан агӀона чохь гойтуш ю дукха хан йоццуш чуйаьхна файлаш.',
'newimages-legend' => 'Литтар',
'ilsubmit' => 'Лаха',
'sp-newimages-showfrom' => 'Гайта керла файлаш $2, $1 тӀера дуьйна',

# Video information, used by Language::formatTimePeriod() to format lengths in the above messages
'seconds-abbrev' => '$1оцу',

# Bad image list
'bad_image_list' => 'Барам хила беза ишта:

Лораш хира йу могlамяхь йолу хlумнаш (могlийн, йола луш йолу сабол тlира *).
Дуьхьаралера хьажориг магlарши хила беза хьажориг кху цамагдо сурт дуьлаче.
Тlяхьа йогlуш йолу хьажориг оцу могlарехь хира йу магóш, билгалла аьлча яззамаш долуче, сурт хьаллаточехь.',

# Metadata
'metadata' => 'Метахаамаш',
'metadata-help' => 'ХӀокху файлаца кхин тӀе хаам бу, даиман чуйоккхуш йолу терахьца чоьнашца йа тӀейоккхучуьнца. Нагахь файлан тӀаьхьа хийцам биняхь, тӀаккха цӀхьаболу барам цӀхьаьна ца ба мега хӀинцалера суьртаца.',
'metadata-expand' => 'Гайта кхин тlе болу хаам',
'metadata-collapse' => 'Къайла баккха кхин тlе болу хаам',
'metadata-fields' => 'Метахааман майда, хьахийна йолу хӀокху могӀамца, Ӏад-йитича гойтур ю суьртийн агӀонца, йисинарш хира ю къайлаха.
* make
* model
* datetimeoriginal
* exposuretime
* fnumber
* isospeedratings
* focallength
* artist
* copyright
* imagedescription
* gpslatitude
* gpslongitude
* gpsaltitude',

# Exif tags
'exif-imagewidth' => 'Шоралла',
'exif-imagelength' => 'Локхалла',
'exif-bitspersample' => 'Бесан кIоргалла',
'exif-photometricinterpretation' => 'Беснин модель',
'exif-orientation' => 'Суьртан хьал',
'exif-xresolution' => 'Шоралла',
'exif-yresolution' => 'Локхалла',
'exif-datetime' => 'Файл хийцина терахь а хан',
'exif-imagedescription' => 'Суьртан цӏе',
'exif-software' => 'Лелина программа',
'exif-copyright' => 'Авторан бакъо ерг',
'exif-colorspace' => 'Беснашан хьал',
'exif-compressedbitsperpixel' => 'Бесан кIоргалла дацдина чул тӀехьа',
'exif-pixelxdimension' => 'Суьртан локхалла',
'exif-datetimeoriginal' => 'Дуьххьарлера терахь а хан',
'exif-datetimedigitized' => 'Оцифровк йина терахь а хан а',
'exif-imageuniqueid' => 'Суьртан номер (ID)',
'exif-gpsaltitude' => 'Локхалла',
'exif-gpsdestlatitude' => 'Объектан дохалла',
'exif-gpsdatestamp' => 'Терахь',
'exif-keywords' => 'Коьрта дешнаш',
'exif-objectname' => 'Йоцца цӀе',
'exif-specialinstructions' => 'Къаьсттина тӀехьажор',
'exif-headline' => 'Корта',
'exif-credit' => 'Кхоьхьург, хьа делла сурт',
'exif-source' => 'Хьост',
'exif-languagecode' => 'Мотт',
'exif-iimversion' => 'Верси IIM',
'exif-originaltransmissionref' => 'ДӀадолалун меттиган код',
'exif-label' => 'Билгало',
'exif-datetimemetadata' => 'ТӀехьара метахаамаш хийцина терахь',

# Exif attributes
'exif-compression-1' => 'ТIеIовдан яц',

'exif-copyrighted-false' => 'Юкъараллин хьал',

'exif-orientation-1' => 'Лартӏахь',

'exif-xyresolution-i' => '$1 тӏадамаш дюйман',

'exif-scenetype-1' => 'Сурт даьккхина нис дуьххьал',

'exif-gaincontrol-0' => 'Яц',

'exif-contrast-0' => 'Лартӏахь',

'exif-saturation-0' => 'Лартӏахь',

'exif-sharpness-0' => 'Лартӏахь',

'exif-dc-date' => 'Терахь(ш)',

# External editor support
'edit-externally' => 'Рéдаккха хlокху хlуман, арахьара диллагlарам лелош',
'edit-externally-help' => '(мадарра хьажа. оцу [//www.mediawiki.org/wiki/Manual:External_editors куьйгалийца дlахlотторе])',

# 'all' in various places, this might be different for inflected languages
'watchlistall2' => 'массо',
'namespacesall' => 'массо',
'monthsall' => 'массо',
'limitall' => 'массо',

# Delete conflict
'confirmrecreate' => "Декъашхочо [[User:$1|$1]] ([[User talk:$1|дийцаре]]) хӀара агӀо дӀаяккхина, ахьа иза тая йолийча, дӀаяккхарна бахьна:
: ''$2''
Дехар до, тешал де, хьо иза агӀо меттахӀотто лууш ву/ю але.",
'confirmrecreate-noreason' => 'Декъашхочо [[User:$1|$1]] ([[User talk:$1|дийцаре]]) хӀара агӀо дӀаяккхина, ахьа иза тая йолийча. Дехар до, тешал де, хьо иза агӀо меттахӀотто лууш ву/ю але.',

# action=watch/unwatch
'confirm-watch-top' => 'ТӀетоха хӀара агӀо хьан тергаме могӀам юкъа?',

# Multipage image navigation
'imgmultipageprev' => '← хьалхара агlо',
'imgmultipagenext' => 'тlаьхьара агlо →',
'imgmultigo' => 'ДехьагӀо!',
'imgmultigoto' => 'АгӀончу $1 гӀо',

# Table pager
'table_pager_next' => 'Тlаьхьа йогlу агlо',
'table_pager_prev' => 'Хьалха йоьду агlо',
'table_pager_first' => 'Дуьххьаралера агlо',
'table_pager_last' => 'Тlаьххьаралера агlо',
'table_pager_limit' => 'Гайта $1 хlумнаш агlон тlаьхь',
'table_pager_limit_label' => 'АгӀона чохь гойтуш ю оццул:',
'table_pager_limit_submit' => 'Кхочушдé',
'table_pager_empty' => 'Цакарийна',

# Auto-summaries
'autosumm-blank' => 'Агӏон чулацам дӏабяккхина',
'autosumm-replace' => 'АгӀона чуьраниг хийцина оцу «$1»',
'autoredircomment' => 'ДӀасахьажийна цуна [[$1]] тӏе',
'autosumm-new' => 'Керла агlо: «$1»',

# Live preview
'livepreview-loading' => 'Чуйолуш…',
'livepreview-ready' => 'Чуйолуш… Кийча йу!',

# Watchlist editor
'watchlistedit-normal-explain' => 'Лахахь гойту хьан тергаме могӀамехь йолу агӀонаш.
ДӀаяздарш дӀадаха билгалде уьш такха тӀетаӀе кнопка «{{int:Watchlistedit-normal-submit}}».
Кхин хьа йиш ю [[Special:EditWatchlist/raw|йозан кепар могӀом нисба ]].',
'watchlistedit-normal-submit' => 'ДӀадаха дӀаяздарш',

# Watchlist editing tools
'watchlisttools-view' => 'Могlам чура агlонашан хийцамаш',
'watchlisttools-edit' => 'Хьажа/нисбé могlам',
'watchlisttools-raw' => 'Йоза санна нисдé',

# Signatures
'signature' => '[[{{ns:user}}:$1|$2]] ([[{{ns:user_talk}}:$1|дийцаре]])',

# Special:Version
'version' => 'Верси MediaWiki',
'version-variables' => 'Хийцаме',
'version-other' => 'Кхин',
'version-license' => 'Бакъо',

# Special:Redirect
'redirect' => 'Декъашхочун файлан тӀера дӀасхьажор',
'redirect-legend' => 'Файлан я агӀона тӀера дӀасхьажор',
'redirect-summary' => 'ХӀара агӀо лело йиш ю файлан я агӀона тӀера дӀасхьажош.',
'redirect-value' => 'МаьӀна:',
'redirect-user' => 'Декъашхочун ID',

# Special:FileDuplicateSearch
'fileduplicatesearch' => 'Лаха цхьатера йолу хIумнаш',
'fileduplicatesearch-filename' => 'Файлан цӀе:',
'fileduplicatesearch-submit' => 'Лаха',
'fileduplicatesearch-info' => '$1 × $2 {{PLURAL:$2|пиксель|пикселш|пикселш}}<br />Файлан барам: $3<br />MIME-тайп: $4',

# Special:SpecialPages
'specialpages' => 'Леррина агlонаш',
'specialpages-note' => '----
* Гуттарлера белха агlонаш.
* <strong class="mw-specialpagerestricted">Кlеззиг таронаш йолу леррина агlонаш.</strong>',
'specialpages-group-maintenance' => 'Жамlаш гlирса хьашташ кхочушдар',
'specialpages-group-other' => 'Кхин гlуллакхан агlонаш',
'specialpages-group-login' => 'Хьой вовзийта/йовзийта / дӀавазло/дӀаязло',
'specialpages-group-changes' => 'Керла нисдарш а тéптарш',
'specialpages-group-media' => 'Жамlаш оцу медиа-гlирсашан а чуяхарш',
'specialpages-group-users' => 'Декъашхой а бакъонаш',
'specialpages-group-highuse' => 'Уггаре дукха лелайо агlонаш',
'specialpages-group-pages' => 'Агlонаши могlамаш',
'specialpages-group-pagetools' => 'Гlирсаш оцу агlонашан',
'specialpages-group-wiki' => 'Хаамаш а гӀирсаш а',
'specialpages-group-redirects' => 'Дlасахьажош йолу гlуллакхан агlонаш',
'specialpages-group-spam' => 'Спаман дуьхьала гӀирсаш',

# Special:BlankPage
'blankpage' => 'Йаьсса агlо',

# Special:Tags
'tags' => 'Болш болу хийцаман къастам',
'tag-filter' => 'Къастам [[Special:Tags|хьажар]]:',
'tag-filter-submit' => 'Литта',
'tags-title' => 'Билгалонаш',
'tags-intro' => 'ХӀокху агӀона чохь гойтуш бу билгалошан могӀам царца программин латторо билгал доху нисдарш, кхин билгалошан маьӀна а.',
'tags-tag' => 'Билгалона цӀе',
'tags-display-header' => 'МогӀам чохь хийцамаш гар',
'tags-description-header' => 'МаьӀнан дуьззина сурт хӀоттор',
'tags-hitcount-header' => 'Къастам бина нисдарш',
'tags-edit' => 'нисйé',
'tags-hitcount' => '$1 {{PLURAL:$1|хийцам|хийцамаш|хийцамаш}}',

# Special:ComparePages
'comparepages' => 'АгӀонаш муха ю хьажар',
'compare-selector' => 'АгӀонашан версеш муха ю хьажар',
'compare-page1' => 'Дуьххьаралера агӀо',
'compare-page2' => 'ШолгӀа агӀо',
'compare-rev1' => 'Дуьххьаралера верси',
'compare-rev2' => 'ШолгӀа верси',
'compare-submit' => 'Муха ю хьажа',

# Database error messages
'dberr-header' => 'Хlара вики ловш йу халона бала',
'dberr-problems' => 'Бехк ма бил! Хlинц машан меттиган хилла гlирсаца халонаш.',
'dberr-again' => 'Хьажа карла йаккха агlо массех минот йаьлча.',
'dberr-info' => '(аьтто ца хили зlе хlотта гlулкхдечуьнца бухара хаамашца: $1)',
'dberr-usegoogle' => 'Цlачун хьо хьажа лаха гlонца Google.',
'dberr-outofdate' => 'Хьуна хаалахь, цуьна йолу меттиг хила мега тишйелла черахь.',

# HTML forms
'htmlform-submit' => 'ДӀадахьийта',
'htmlform-reset' => 'Цаоьшу хийцамаш',
'htmlform-selectorother-other' => 'Кхин',

# New logging system
'logentry-delete-delete' => '$1 {{GENDER:$2|дӀаякхина|дӀаякхина}} агӀо $3',
'logentry-delete-restore' => '$1 {{GENDER:$2|меттахӀоттайина|меттахӀоттайина}} агӀо $3',
'logentry-move-move' => '$1 {{GENDER:$2|цӀе хийцина|цӀе хийцина}} $3 оцу $4',
'logentry-move-move-noredirect' => '$1 {{GENDER:$2|цӀе хийцина|цӀе хийцина}} $3 оцу $4 дӀасахьажийнарг цаюьтуш',
'logentry-move-move_redir' => '$1 {{GENDER:$2|цӀе хийцина|цӀе хийцина}} $3 оцу $4 дӀасахьажоран тӀохул',
'logentry-move-move_redir-noredirect' => '$1 {{GENDER:$2|цӀе хийцина|цӀе хийцина}} $3 оцу $4 дӀасахьажоран тӀохул а дӀасахьажийнарг цаюьтуш а',
'logentry-newusers-newusers' => '{{GENDER:$2|ДӀавазвелла|ДӀаязелла}} керла декъашхо $1',
'logentry-newusers-create' => '{{GENDER:$2|ДӀавазвелла|ДӀаязелла}} керла декъашхо $1',
'logentry-rights-rights-legacy' => '$1 {{GENDER:$2|хийцина}} хӏокхуна $3 бакъо',
'rightsnone' => '(яц)',

# Feedback
'feedback-cancel' => 'Цаоьшу',

# Search suggestions
'searchsuggest-search' => 'Лаха',

);
