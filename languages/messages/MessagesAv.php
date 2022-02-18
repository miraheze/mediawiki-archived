<?php
/** Avaric (авар)
 *
 * To improve a translation please visit https://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 */

$fallback = 'ru';

$namespaceNames = [
	NS_MEDIA            => 'Медиа',
	NS_SPECIAL          => 'Хъулухъалъулаб',
	NS_TALK             => 'БахӀс',
	NS_USER             => 'ГӀахьалчи',
	NS_USER_TALK        => 'ГӀахьалчиясул_бахӀс',
	NS_PROJECT_TALK     => '$1лъул_бахӀс',
	NS_FILE             => 'Файл',
	NS_FILE_TALK        => 'Файлалъул_бахӀс',
	NS_MEDIAWIKI        => 'MediaWiki',
	NS_MEDIAWIKI_TALK   => 'MediaWiki-ялъул_бахӀс',
	NS_TEMPLATE         => 'Халип',
	NS_TEMPLATE_TALK    => 'Халипалъул_бахӀс',
	NS_HELP             => 'Кумек',
	NS_HELP_TALK        => 'Кумекалъул_бахӀс',
	NS_CATEGORY         => 'Категория',
	NS_CATEGORY_TALK    => 'Категориялъул_бахӀс',
];

$namespaceGenderAliases = [
	NS_USER      => [ 'male' => 'ГӀахьалчи', 'female' => 'ГӀахьалчӀужу' ],
	NS_USER_TALK => [ 'male' => 'ГӀахьалчиясул_бахӀс', 'female' => 'ГӀахьалчӀужуялъул_бахӀс' ],
];

/** @phpcs-require-sorted-array */
$specialPageAliases = [
	'Activeusers'               => [ 'ХІаракатчилъи_бугел_гІахьалчагІи' ],
	'Allmessages'               => [ 'Системаялъулал_баян_кьеял' ],
	'AllMyUploads'              => [ 'Киналго_дир_файлал' ],
	'Allpages'                  => [ 'Киналго_гьумерал' ],
	'Badtitle'                  => [ 'БукІине_бегьулареб_цІар' ],
	'Blankpage'                 => [ 'ЧІобогояб_гьумер' ],
	'Block'                     => [ 'Блокалада_лъезе' ],
	'BlockList'                 => [ 'Блокалда_лъеялъул_сияхІ', 'Блокалда_лъеял' ],
	'Booksources'               => [ 'ТІахьазул_иццал' ],
	'BrokenRedirects'           => [ 'Рек-рекарал_цоги_бакІалде_руссинариял' ],
	'Categories'                => [ 'Категориял' ],
	'ChangeEmail'               => [ 'e-mail_хисизе', 'Почта_хисизе' ],
	'ChangePassword'            => [ 'Балъгояб_рагІи_хисизе' ],
	'ComparePages'              => [ 'Гьумеразул_дандекквей' ],
	'Confirmemail'              => [ 'E-mail_битІухъ_гьаби', 'почта_битІухъ_гьаби' ],
	'Contributions'             => [ 'Хазина' ],
	'CreateAccount'             => [ 'Учёталъулаб_Хъвай-хъвагІай_гІуцІцІизе', 'ГІахьалчи_гІуцІцІизе', 'Регистрация_гьабизе' ],
	'Deadendpages'              => [ 'Нух_къарал_гьумерал' ],
	'DeletedContributions'      => [ 'Нахъе_гьабураб_хазина' ],
	'Diff'                      => [ 'Хиса-басиял' ],
	'DoubleRedirects'           => [ 'КІицІулго_цоги_бакІалде_руссинариял' ],
	'EditWatchlist'             => [ 'Халкквеялъул_сияхІ_хисизабизе' ],
	'Emailuser'                 => [ 'ГІахьалчиясухъе_кагъат', 'Кагъат_битІизе' ],
	'ExpandTemplates'           => [ 'Шаблонал_кколе-кколелъуре_ккезари' ],
	'Export'                    => [ 'КъватІибе_битІи', 'ЧIехьей' ],
	'Fewestrevisions'           => [ 'КъанагІат_хиса-баси_гьарулел' ],
	'FileDuplicateSearch'       => [ 'Релъарал_файлал_хъирщи' ],
	'Filepath'                  => [ 'Файлалде_нух' ],
	'Import'                    => [ 'Импорт' ],
	'Invalidateemail'           => [ 'Адрес_битІухъ_гьаби_нахъ_чІвазе' ],
	'JavaScriptTest'            => [ 'JavaScript_хІалбихьи' ],
	'LinkSearch'                => [ 'Ссылкаби_хъирщи' ],
	'Listbots'                  => [ 'Ботазул_сияхІ' ],
	'ListDuplicatedFiles'       => [ 'Релъарал_файлазул_сияхІ' ],
	'Listfiles'                 => [ 'Файлазул_сияхІ', 'Суратазул_сияхІ' ],
	'Listgrouprights'           => [ 'ГІахьалчагІазул_группабазул_ихтиярал', 'Группабазул_ихтияразул_сияхІ' ],
	'Listredirects'             => [ 'Цоги_бакІалде_руссинабиязул_сияхІ' ],
	'Listusers'                 => [ 'ГІахьалчагІазул_сияхІ' ],
	'Lockdb'                    => [ 'ХІБ_блокалда_лъезе', 'ХІужжабазул_база_блокалда_лъезе' ],
	'Log'                       => [ 'Журналал', 'Журнал' ],
	'Lonelypages'               => [ 'БатІатІурал_гьумерал' ],
	'Longpages'                 => [ 'Халатал_гьумерал' ],
	'MergeHistory'              => [ 'Тарихал_цо_гьари' ],
	'MIMEsearch'                => [ 'MIME_ялдалъул_хъирщи' ],
	'Mostcategories'            => [ 'Бищунго_категориял_цІикІкІарал' ],
	'Mostimages'                => [ 'Бищунго_хІалтІизарулел_файлал' ],
	'Mostinterwikis'            => [ 'Интервики-ссылкабазул_бищун_цІикІкІараб_къадар' ],
	'Mostlinked'                => [ 'Бищунго_хІалтІизарулел_гьумерал' ],
	'Mostlinkedcategories'      => [ 'Бищунго_хІалтІизарулел_категориял' ],
	'Mostlinkedtemplates'       => [ 'Бищунго_хІалтІизарулел_шаблонал' ],
	'Mostrevisions'             => [ 'Сверелазул_бищун_цІикІкІараб_къадар' ],
	'Movepage'                  => [ 'Гьумералда_цІар_хисизабизе', 'ЦІар_хисизаби', 'ЦІар_хисизе' ],
	'Mycontributions'           => [ 'Дир_хазина' ],
	'MyLanguage'                => [ 'Дир_мацІ' ],
	'Mypage'                    => [ 'Дир_гьумер' ],
	'Mytalk'                    => [ 'Дир_бахІс' ],
	'Myuploads'                 => [ 'Дица_жанире_цІарал_жал' ],
	'Newimages'                 => [ 'ЦІиял_файлал' ],
	'Newpages'                  => [ 'ЦІиял_гьумерал' ],
	'PasswordReset'             => [ 'Сброс_пароля' ],
	'PermanentLink'             => [ 'Даимаб_ссылка' ],
	'Preferences'               => [ 'Рекъезабиял' ],
	'Prefixindex'               => [ 'ЦІаразул_бетІералде_бихьизаби' ],
	'Protectedpages'            => [ 'ЦІунарал_гьумерал' ],
	'Protectedtitles'           => [ 'ЦІунарал_цІарал' ],
	'Randompage'                => [ 'Цебе_ккараб_гьумер', 'Цебе_ккараб' ],
	'Randomredirect'            => [ 'Цебе_ккараб_цоги_бакІалде_руссинаби' ],
	'Recentchanges'             => [ 'ЦІиял_хиса-басиял' ],
	'Recentchangeslinked'       => [ 'Хурхинарурал_хиса-басиял' ],
	'Revisiondelete'            => [ 'Хиса-баси_нахъе_бацІцІи' ],
	'Search'                    => [ 'Хъирщи' ],
	'Shortpages'                => [ 'Къокъал_гьумерал' ],
	'Specialpages'              => [ 'Хассал_гьумерал' ],
	'Statistics'                => [ 'Статистика' ],
	'Tags'                      => [ 'ГІужал' ],
	'Unblock'                   => [ 'Блокалдаса_бахъи' ],
	'Uncategorizedcategories'   => [ 'Категориял_гьечІел_категориял' ],
	'Uncategorizedimages'       => [ 'Категориял_гьечІел_файлал' ],
	'Uncategorizedpages'        => [ 'Категориял_гьечІел_гьумерал' ],
	'Uncategorizedtemplates'    => [ 'Категориял_гьечІе_шаблонал' ],
	'Undelete'                  => [ 'ТІадбуссинабизе', 'ТІадбуссинаби' ],
	'Unlockdb'                  => [ 'ХІБ_блокалдаса_бахъи' ],
	'Unusedcategories'          => [ 'ХІалтІизаруларел_категориял' ],
	'Unusedimages'              => [ 'ХІалтІизаруларел_файлал' ],
	'Unusedtemplates'           => [ 'ХІалтІизаруларел_шаблонал' ],
	'Upload'                    => [ 'Загрузка' ],
	'UploadStash'               => [ 'Бахчараб_загрузка' ],
	'Userlogin'                 => [ 'Жаниве_лъугьин' ],
	'Userlogout'                => [ 'Сеанс_лъугІи', 'КъватІиве_лъугьин' ],
	'Userrights'                => [ 'Ихтиярал_рилълъинари' ],
	'Version'                   => [ 'Сверел', 'Версия' ],
	'Wantedcategories'          => [ 'ХІажатал_категориял' ],
	'Wantedfiles'               => [ 'ХІажатал_файлал' ],
	'Wantedpages'               => [ 'ХІажатал_гьумерал' ],
	'Wantedtemplates'           => [ 'ХІажатал_шаблонал' ],
	'Watchlist'                 => [ 'Халкквеялъул_сияхІ' ],
	'Whatlinkshere'             => [ 'Ссылкаби_гьанире' ],
	'Withoutinterwiki'          => [ 'Интервики_гьечІого' ],
];

$linkTrail = '/^([a-zабвгдеёжзийклмнопрстуфхцчшщъыьэюяӀ]+)(.*)$/sDu';
