<?php
/** Aramaic (ܐܪܡܝܐ)
 *
 * To improve a translation please visit https://translatewiki.net
 *
 * @ingroup Language
 * @file
 *
 */

$rtl = true;

$namespaceNames = [
	NS_MEDIA            => 'ܡܝܕܝܐ',
	NS_SPECIAL          => 'ܕܝܠܢܝܐ',
	NS_TALK             => 'ܡܡܠܠܐ',
	NS_USER             => 'ܡܦܠܚܢܐ',
	NS_USER_TALK        => 'ܡܡܠܠܐ_ܕܡܦܠܚܢܐ',
	NS_PROJECT_TALK     => 'ܡܡܠܠܐ_ܕ$1',
	NS_FILE             => 'ܠܦܦܐ',
	NS_FILE_TALK        => 'ܡܡܠܠܐ_ܕܠܦܦܐ',
	NS_MEDIAWIKI        => 'ܡܝܕܝܐܘܝܩܝ',
	NS_MEDIAWIKI_TALK   => 'ܡܡܠܠܐ_ܕܡܝܕܝܐܘܝܩܝ',
	NS_TEMPLATE         => 'ܩܠܒܐ',
	NS_TEMPLATE_TALK    => 'ܡܡܠܠܐ_ܕܩܠܒܐ',
	NS_HELP             => 'ܥܘܕܪܢܐ',
	NS_HELP_TALK        => 'ܡܡܠܠܐ_ܕܥܘܕܪܢܐ',
	NS_CATEGORY         => 'ܣܕܪܐ',
	NS_CATEGORY_TALK    => 'ܡܡܠܠܐ_ܕܣܕܪܐ',
];

$namespaceAliases = [
	'ܡܬܚܫܚܢܐ'        => NS_USER,
	'ܡܡܠܠܐ_ܕܡܬܚܫܚܢܐ' => NS_USER_TALK,
];

/** @phpcs-require-sorted-array */
$specialPageAliases = [
	'Activeusers'               => [ 'ܡܦܠܚܢ̈ܐ_ܙܪ̈ܝܙܐ' ],
	'Allmessages'               => [ 'ܟܠܗܝܢ_ܐܓܪ̈ܬܐ' ],
	'Allpages'                  => [ 'ܟܠܗܝܢ_ܦܐܬܬ̈ܐ' ],
	'Ancientpages'              => [ 'ܦܐܬܬ̈ܐ_ܥܬܝܩ̈ܬܐ' ],
	'Badtitle'                  => [ 'ܟܘܢܝܐ_ܠܐ_ܛܒܐ' ],
	'Blankpage'                 => [ 'ܦܐܬܐ_ܣܦܝܩܬܐ' ],
	'BrokenRedirects'           => [ 'ܨܘܝܒ̈ܐ_ܬܒܝܪ̈ܐ' ],
	'Categories'                => [ 'ܣܕܪ̈ܐ' ],
	'ChangeEmail'               => [ 'ܫܚܠܦ_ܒܝܠܕܪܐ_ܐܠܩܛܪܘܢܝܐ' ],
	'ComparePages'              => [ 'ܦܚܡ_ܒܝܢܬ_ܦܐܬܬ̈ܐ' ],
	'Confirmemail'              => [ 'ܫܪܪ_ܒܝܠܕܪܐ_ܐܠܩܛܪܘܢܝܐ' ],
	'Contributions'             => [ 'ܫܘܬܦܘ̈ܬܐ' ],
	'CreateAccount'             => [ 'ܒܪܝ_ܚܘܫܒܢܐ' ],
	'Deadendpages'              => [ 'ܦܐܬܬ̈ܐ_ܥܡ_ܚܪܬܐ_ܡܝܬܬܐ' ],
	'DeletedContributions'      => [ 'ܫܘܬܦܘ̈ܬܐ_ܫܝ̈ܦܬܐ' ],
	'DoubleRedirects'           => [ 'ܨܘܝܒ̈ܐ_ܥܦܝ̈ܦܐ' ],
	'EditWatchlist'             => [ 'ܫܚܠܦ_ܪ̈ܗܝܬܐ' ],
	'Emailuser'                 => [ 'ܫܕܪ_ܒܝܠܕܪܐ_ܐܠܩܛܪܘܢܝܐ_ܠܡܦܠܚܢܐ' ],
	'Fewestrevisions'           => [ 'ܬܢܝ̈ܬܐ_ܒܨܝܪ_ܡܢ_ܟܠ' ],
	'Filepath'                  => [ 'ܫܒܝܠܐ_ܕܦܐܬܐ' ],
	'Log'                       => [ 'ܣܓܠܐ', 'ܣܓܠ̈ܐ' ],
	'Lonelypages'               => [ 'ܦܐܬܬ̈ܐ_ܝܬܡ̈ܬܐ' ],
	'Longpages'                 => [ 'ܦܐܬܬ̈ܐ_ܐܪ̈ܝܟܬܐ' ],
	'Mostlinkedcategories'      => [ 'ܣܕܪ̈ܐ_ܐܣܝܪ̈ܐ_ܝܬܝܪ_ܡܢ_ܟܠ', 'ܣܕܪ̈ܐ_ܦܠܝܚ̈ܐ_ܝܬܝܪ_ܡܢ_ܟܠ' ],
	'Mostlinkedtemplates'       => [ 'ܩܠܒ̈ܐ_ܐܣܝܪ̈ܐ_ܝܬܝܪ_ܡܢ_ܟܠ', 'ܩܠܒ̈ܐ_ܦܠܝܚ̈ܐ_ܝܬܝܪ_ܡܢ_ܟܠ' ],
	'Mostrevisions'             => [ 'ܬܢܝ̈ܬܐ_ܝܬܝܪ_ܡܢ_ܟܠ' ],
	'Movepage'                  => [ 'ܫܢܝ_ܦܐܬܐ' ],
	'Mycontributions'           => [ 'ܫܘܬܦܘ̈ܬܝ' ],
	'MyLanguage'                => [ 'ܠܫܢܐ_ܕܝܠܝ' ],
	'Mypage'                    => [ 'ܦܐܬܐ_ܕܝܠܝ' ],
	'Mytalk'                    => [ 'ܡܡܠܠܐ_ܕܝܠܝ' ],
	'Myuploads'                 => [ 'ܐܣܩ̈ܬܐ_ܕܝܠܝ' ],
	'Newimages'                 => [ 'ܠܦܦ̈ܐ_ܚܕ̈ܬܐ', 'ܨܘܪ̈ܬܐ_ܚܕ̈ܬܬܐ' ],
	'Newpages'                  => [ 'ܦܐܬܬ̈ܐ_ܚܕ̈ܬܬܐ' ],
	'PermanentLink'             => [ 'ܐܣܘܪܐ_ܦܝܘܫܐ' ],
	'Preferences'               => [ 'ܨܒܝܢܝܘ̈ܬܐ' ],
	'Protectedpages'            => [ 'ܦܐܬܬ̈ܐ_ܢܛܝܪ̈ܬܐ' ],
	'Protectedtitles'           => [ 'ܟܘܢܝ̈ܐ_ܢܛܝܪ̈ܐ' ],
	'Recentchanges'             => [ 'ܫܘܚܠܦ̈ܐ_ܚܕ̈ܬܐ' ],
	'Search'                    => [ 'ܒܨܝܐ' ],
	'Shortpages'                => [ 'ܦܐܬܬ̈ܐ_ܟܪ̈ܝܬܐ' ],
	'Specialpages'              => [ 'ܦܐܬܬ̈ܐ_ܕ̈ܝܠܢܝܬܐ' ],
	'Statistics'                => [ 'ܚܒܝܫܘܬ_ܡܢܝܢܐ' ],
	'Uncategorizedcategories'   => [ 'ܣܕܪ̈ܐ_ܠܐ_ܣܕܝܪ̈ܐ' ],
	'Uncategorizedimages'       => [ 'ܠܦܦ̈ܐ_ܠܐ_ܣܕܝܪ̈ܐ', 'ܨܘܪ̈ܬܐ_ܠܐ_ܣܕܝܪ̈ܬܐ' ],
	'Uncategorizedpages'        => [ 'ܦܐܬܬ̈ܐ_ܠܐ_ܣܕܝܪ̈ܬܐ' ],
	'Uncategorizedtemplates'    => [ 'ܩܠܒ̈ܐ_ܠܐ_ܣܕܝܪ̈ܐ' ],
	'Unusedcategories'          => [ 'ܣܕܪ̈ܐ_ܠܐ_ܦܠܝܚ̈ܐ' ],
	'Unusedimages'              => [ 'ܠܦܦ̈ܐ_ܠܐ_ܦܠܝܚ̈ܐ', 'ܨܘܪ̈ܬܐ_ܠܐ_ܦܠܝܚܬ̈ܐ' ],
	'Unusedtemplates'           => [ 'ܩܠܒ̈ܐ_ܠܐ_ܦܠܝܚ̈ܐ' ],
	'Unwatchedpages'            => [ 'ܦܐܬܬ̈ܐ_ܠܐ_ܣܢܝܩ̈ܬܐ' ],
	'Upload'                    => [ 'ܐܣܩ' ],
	'Userlogin'                 => [ 'ܥܠܠܐ_ܕܡܦܠܚܢܐ' ],
	'Userlogout'                => [ 'ܦܠܛܐ_ܕܡܦܠܚܢܐ' ],
	'Userrights'                => [ 'ܙܕ̈ܩܐ_ܕܡܦܠܚܢܐ', 'ܥܒܕ_ܡܕܒܪܢܐ_ܕܛܟܣܐ', 'ܥܒܕ_ܒܘܛ' ],
	'Version'                   => [ 'ܡܦܩܬܐ' ],
	'Wantedcategories'          => [ 'ܣܕܪ̈ܐ_ܣܢܝܩ̈ܐ' ],
	'Wantedfiles'               => [ 'ܠܦܦ̈ܐ_ܣܢܝܩ̈ܐ' ],
	'Wantedpages'               => [ 'ܦܐܬܬ̈ܐ_ܣܢܝܩ̈ܬܐ', 'ܐܣܘܪ̈ܐ_ܬܒܝܪ̈ܐ' ],
	'Wantedtemplates'           => [ 'ܩܠܒ̈ܐ_ܣܢܝܩ̈ܐ' ],
	'Watchlist'                 => [ 'ܪ̈ܗܝܬܐ' ],
	'Whatlinkshere'             => [ 'ܡܐ_ܐܣܪ_ܠܗܪܟܐ' ],
];

/** @phpcs-require-sorted-array */
$magicWords = [
	'gender'                    => [ '0', 'ܓܢܣܐ:', 'GENDER:' ],
	'grammar'                   => [ '0', 'ܬܘܪܨ_ܡܡܠܠܐ:', 'GRAMMAR:' ],
	'img_baseline'              => [ '1', 'ܣܪܛܐ_ܫܪܫܝܐ', 'baseline' ],
	'img_border'                => [ '1', 'ܬܚܘܡܐ', 'border' ],
	'img_center'                => [ '1', 'ܡܨܥܐ', 'center', 'centre' ],
	'img_left'                  => [ '1', 'ܣܡܠܐ', 'left' ],
	'img_manualthumb'           => [ '1', 'ܙܥܘܪܬܐ=$1', 'thumbnail=$1', 'thumb=$1' ],
	'img_none'                  => [ '1', 'ܠܐ_ܡܕܡ', 'none' ],
	'img_page'                  => [ '1', 'ܦܐܬܐ=$1', 'ܦܐܬܐ $1', 'page=$1', 'page $1' ],
	'img_right'                 => [ '1', 'ܝܡܝܢܐ', 'right' ],
	'img_sub'                   => [ '1', 'ܦܪܥܝܐ', 'sub' ],
	'img_thumbnail'             => [ '1', 'ܙܥܘܪܬܐ', 'thumb', 'thumbnail' ],
	'language'                  => [ '0', '#ܠܫܢܐ:', '#LANGUAGE:' ],
	'msg'                       => [ '0', 'ܐܓܪܬܐ:', 'MSG:' ],
	'namespace'                 => [ '1', 'ܚܩܠܐ', 'NAMESPACE' ],
	'numberofarticles'          => [ '1', 'ܡܢܝܢܐ_ܕܡܠܘܐ̈ܐ', 'NUMBEROFARTICLES' ],
	'numberoffiles'             => [ '1', 'ܡܢܝܢܐ_ܕܠܦܦ̈ܐ', 'NUMBEROFFILES' ],
	'numberofpages'             => [ '1', 'ܡܢܝܢܐ_ܕܦܐܬܬ̈ܐ', 'NUMBEROFPAGES' ],
	'pagename'                  => [ '1', 'ܫܡܐ_ܕܦܐܬܐ', 'PAGENAME' ],
	'pagenamee'                 => [ '1', 'ܟܘܢܝܐ_ܕܦܐܬܐ', 'PAGENAMEE' ],
	'redirect'                  => [ '0', '#ܨܘܝܒܐ', '#REDIRECT' ],
	'special'                   => [ '0', 'ܕܝܠܢܝܐ', 'special' ],
	'url_path'                  => [ '0', 'ܫܒܝܠܐ', 'PATH' ],
	'url_wiki'                  => [ '0', 'ܘܝܩܝ', 'WIKI' ],
];
