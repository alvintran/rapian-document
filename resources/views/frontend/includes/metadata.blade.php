<title>{{ $metadata->getMetaTitle() }} :: {{ $metadata->getName() }}</title>
<meta name="google-site-verification" content="T5QmFLMRpWm-OTKvHchxN-KDNZAvycihstvSB2rvS-M" />
<meta name="keywords" content="{{ $metadata->getMetaKeyword() }}"/>
<meta name="description" content="{{ $metadata->getDescription() }}"/>
<meta name="author" content="{{ $metadata->getName() }}"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="canonical" href="{{ URL::current() }}" />
<meta itemprop="name" content="{{ $metadata->getName() }}">
<meta itemprop="description" content="{{ $metadata->getDescription() }}">
<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $metadata->getMetaTitle() }}" />
<meta property="og:image" content="" />
<meta property="og:description" content="{{ $metadata->getDescription() }}" />
<meta property="og:site_name" content="TaobaoBlog" />
<meta property="og:url" content="{{ URL::current() }}" />
<meta name="twitter:card" content="{{ $metadata->getName() }}">
<meta name="twitter:site" content="{{ $metadata->getTwitter() }} ">
<meta name="twitter:title" content="{{ $metadata->getMetaTitle() }}">
<meta name="twitter:description" content="{{ $metadata->getDescription() }}">
<meta name="twitter:creator" content="{{ $metadata->getTwitter()}} ">