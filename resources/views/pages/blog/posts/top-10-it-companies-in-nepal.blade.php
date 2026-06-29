@extends('layouts.app')

@section('title', 'Top 10 IT Companies in Nepal (2025) | Nabaraj Acharya')
@section('description', 'Discover the top 10 IT companies in Nepal powering a $1B tech revolution. From F1Soft to Fusemachines — explore services, clients & why Nepal is Asia\'s rising tech hub.')
@section('keywords', 'top IT company in Nepal, best IT company in Nepal, software company in Nepal, web development company Nepal, IT services Nepal, Nepal tech companies, Nepal software export, IT outsourcing Nepal')
@section('canonical', route('blog.top-10-it-companies-in-nepal'))
@section('og_type', 'article')


@section('schema')
@php
    $articleSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => 'Top 10 IT Companies in Nepal (2025): The Definitive Guide',
        'description' => 'Discover the top 10 IT companies in Nepal powering a $1B tech revolution. From F1Soft to Fusemachines — explore services, clients & why Nepal is Asia\'s rising tech hub.',
        'datePublished' => '2026-05-11T18:41:51+05:45',
        'author' => ['@type' => 'Person', 'name' => $personal->brand_name ?? 'Nabaraj Acharya'],
        'mainEntityOfPage' => route('blog.top-10-it-companies-in-nepal'),
        
        'timeRequired' => 'PT15M',
    ];
    $breadcrumbSchema = ['@context' => 'https://schema.org', '@type' => 'BreadcrumbList', 'itemListElement' => [
        ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => route('home')],
        ['@type' => 'ListItem', 'position' => 2, 'name' => 'Blog', 'item' => route('blog.index')],
        ['@type' => 'ListItem', 'position' => 3, 'name' => 'Top 10 IT Companies in Nepal (2025): The Definitive Guide', 'item' => route('blog.top-10-it-companies-in-nepal')],
    ]];
@endphp
<script type="application/ld+json">{!! json_encode($articleSchema) !!}</script>
<script type="application/ld+json">{!! json_encode($breadcrumbSchema) !!}</script>
@endsection

@section('content')
<section class="page-hero pt-32 pb-10 md:pt-40 md:pb-14">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center">
        <h1 class="font-display text-3xl md:text-5xl font-bold mb-4" style="color: var(--ink);">Top 10 IT Companies in Nepal (2025): The Definitive Guide</h1>
        <div class="flex flex-wrap items-center justify-center gap-3 mb-4">
            <span class="skill-badge">May 11, 2026</span>
            <span class="skill-badge">15 min read</span>
        </div>
        <p class="text-sm" style="color: var(--ink-faint);">
            <a href="{{ route('home') }}" class="hover:underline">Home</a><span class="mx-1">&rsaquo;</span>
            <a href="{{ route('blog.index') }}" class="hover:underline">Blog</a><span class="mx-1">&rsaquo;</span>
            <span style="color: var(--accent);">Top 10 IT Companies in Nepal (2025): The Definitive Guide</span>
        </p>
    </div>
</section>

<section class="py-10 md:py-14 reveal">
    <div class="max-w-3xl mx-auto px-4 sm:px-6">

        <p class="text-lg leading-relaxed mb-8" style="color: var(--ink); border-left: 4px solid var(--accent); padding-left: 16px;">Nepal&#039;s IT industry crossed $1 billion in software exports in 2025. Here is your authoritative guide to the top 10 IT companies in Nepal — covering services, technologies, notable clients, and why Nepal is becoming Asia&#039;s next major tech hub.</p>

        <div class="post-content">

<!-- ═══════════════════════════════════════════════════════ -->
<!--  FEATURED SNIPPET TARGET                                -->
<!-- ═══════════════════════════════════════════════════════ -->
<p>The <strong>top 10 IT companies in Nepal</strong> are <strong>F1Soft International, Leapfrog Technology, Deerwalk Services, CloudFactory, Cotiviti Nepal, Fusemachines, Young Innovations, Janaki Technology, Verisk Nepal, and Yomari Information Services</strong>. These companies collectively employ thousands of tech professionals, serve hundreds of global enterprise clients, and specialise in fintech, healthcare IT, artificial intelligence, data annotation, civic technology, and enterprise software — making Nepal a recognised name in the global software industry.</p>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  SECTION 1: Nepal IT Overview                           -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>Nepal's IT Industry: A $1 Billion Story</h2>

<p>Not long ago, Nepal was known primarily for Mount Everest, ancient temples, and high-altitude trekking. Today it is also known for something else: <strong>world-class software</strong>. In 2025, Nepal's IT sector officially crossed the <strong>$1 billion annual export milestone</strong> — a figure that would have seemed impossibly ambitious a decade ago.</p>

<p>This is not an accident. It is the result of two deliberate decades of ecosystem-building: young engineers graduating from Kathmandu University and Tribhuvan University, scrappy startups growing into enterprise-grade software houses, and global firms discovering Nepal as a high-quality, cost-efficient technology partner. US healthcare giants, Fortune 500 analytics companies, and AI unicorns all have operations here — and the list keeps growing.</p>

<blockquote>Nepal's IT sector crossed $1 billion in annual exports in 2025, employing 100,000+ professionals across 500+ registered companies — with a 64% year-over-year growth rate.</blockquote>

<p>What is driving this growth? A potent combination: a young English-proficient talent pool, time-zone compatibility with US and European clients, maturing government digital initiatives under the <strong>Digital Nepal Framework 2.0</strong>, and a startup culture that punches well above its weight. The sector is well on its way toward the government's ambitious 10-year targets.</p>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  SECTION 2: Why Nepal Is a Tech Hub                     -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>Why Nepal Is Becoming Asia's Next Tech Hub</h2>

<p>Sandwiched between two of the world's largest tech nations — India and China — Nepal might seem like an unlikely destination for outsourced software. That is precisely what makes it interesting.</p>

<h3>1. Competitive Cost, International Quality</h3>
<p>Nepal offers <strong>40–60% cost savings</strong> compared to equivalent US or European engineering talent, without sacrificing quality. US healthcare companies like Cotiviti and Cedar Gate (Deerwalk's parent) have proven this model works at serious enterprise scale.</p>

<h3>2. Young, English-Speaking Workforce</h3>
<p>With a median age of 24, Nepal has one of South Asia's youngest populations. Nepali engineers communicate in English, hold internationally recognised technical degrees, and are increasingly trained in cutting-edge domains — machine learning, cloud architecture, cybersecurity, and healthcare informatics.</p>

<h3>3. Time Zone That Works for Global Collaboration</h3>
<p>Nepal Standard Time (UTC+5:45) creates workable overlap with both US East Coast mornings and European afternoons — enabling real-time collaboration during key business hours.</p>

<h3>4. A Maturing Startup Ecosystem</h3>
<p>Kathmandu's startup scene has produced globally recognised products: eSewa, Khalti, Daraz Nepal, and Pathao. <strong>Yala Tech Park in Lalitpur</strong> — Nepal's Silicon Valley — provides the infrastructure, mentorship networks, and investor access the next wave of founders need.</p>

<h3>5. Government-Backed Digital Transformation</h3>
<p>The <strong>Asian Development Bank approved a $40 million concessional loan</strong> to accelerate Nepal's digital transformation. The government's Nagarik App and integrated citizen service portals signal a sustained commitment to becoming a digital-first nation.</p>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  SECTION 3: The Top 10 Companies                        -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>Top 10 IT Companies in Nepal (2025)</h2>


<!-- ── Company 1: F1Soft ── -->
<h3>#1 — F1Soft International: Nepal's Fintech Pioneer</h3>

<p><strong>Founded:</strong> 2004 &nbsp;|&nbsp; <strong>HQ:</strong> Lalitpur, Nepal &nbsp;|&nbsp; <strong>Team:</strong> 600+ &nbsp;|&nbsp; <strong>Website:</strong> f1soft.com</p>

<p>Ask any Nepali about digital payments and they will mention <strong>eSewa</strong>. Behind Nepal's most-used digital wallet is F1Soft International — the company that Biswas Dhakal founded as a college student in 2004, which has since grown into Nepal's most dominant financial technology firm.</p>

<p>The scale of F1Soft's reach is staggering: nearly <strong>90% of Nepal's financial institutions</strong> use at least one of their transaction banking products. BankSmart, Bank-ex, FoneBank, and SMS banking solutions run quietly in the background every time a Nepali makes a mobile payment or checks a bank balance. F1Soft does not just serve Nepal's banks — it powers them.</p>

<p><strong>Key Products:</strong></p>
<ul>
  <li><strong>eSewa</strong> — Nepal's leading digital wallet with millions of active users</li>
  <li><strong>Fonepay</strong> — Nepal's interoperable QR payment network</li>
  <li><strong>BankSmart / Bank-ex / FoneBank</strong> — Mobile and internet banking infrastructure</li>
</ul>

<p><strong>Main Services:</strong> Mobile Financial Services, Transaction Banking Solutions, Digital Payment Gateways, SMS Banking, Card Management Systems.</p>

<p><strong>Industries:</strong> Fintech, Digital Banking, Payment Processing.</p>

<p><strong>Why they stand out:</strong> Twenty years of fintech focus in a single market has made F1Soft essentially irreplaceable in Nepal's financial system. Their competitive moat — deep integration into banks, insurance companies, and payment networks — is nearly impossible to replicate.</p>


<!-- ── Company 2: Leapfrog ── -->
<h3>#2 — Leapfrog Technology: Nepal's Global Software Powerhouse</h3>

<p><strong>Founded:</strong> 2010 &nbsp;|&nbsp; <strong>HQ:</strong> Kathmandu, Nepal &nbsp;|&nbsp; <strong>Global Offices:</strong> Seattle, Portland, Massachusetts (USA) &nbsp;|&nbsp; <strong>Website:</strong> lftechnology.com</p>

<p>Leapfrog Technology was founded in 2010 with a bold thesis: Nepal could produce world-class engineers capable of building enterprise-grade products for demanding global clients. Fifteen years later, with <strong>150+ enterprise clients</strong> across the United States and beyond, that thesis has been validated many times over.</p>

<p>From their Kathmandu headquarters — with offices stretching to Seattle and Boston — Leapfrog delivers AI-powered solutions, healthcare software platforms, and digital transformation services that compete with any firm in the US. They are arguably Nepal's most internationally recognised software development company.</p>

<p><strong>Main Services:</strong></p>
<ul>
  <li>AI &amp; Machine Learning Solutions</li>
  <li>Healthcare Software Development (Health Tech)</li>
  <li>Fintech Application Development</li>
  <li>Web &amp; Mobile Application Development</li>
  <li>Cloud Management &amp; DevOps</li>
  <li>Data Science &amp; Analytics</li>
  <li>QA &amp; Software Testing</li>
</ul>

<p><strong>Technologies:</strong> Artificial Intelligence, Machine Learning, React, Node.js, Python, AWS, Azure, GCP, DevOps toolchains, microservices architecture.</p>

<p><strong>Why they stand out:</strong> Leapfrog invests relentlessly in people — engineers are continuously trained on emerging technologies, meaning clients always receive genuinely modern solutions. Their healthcare IT specialisation is particularly strong, serving US organisations that demand HIPAA-compliant, mission-critical systems.</p>


<!-- ── Company 3: Deerwalk ── -->
<h3>#3 — Deerwalk Services: Healthcare IT at Scale</h3>

<p><strong>Founded:</strong> 2010 &nbsp;|&nbsp; <strong>HQ:</strong> Kathmandu, Nepal &nbsp;|&nbsp; <strong>Parent:</strong> Cedar Gate Technologies (USA) &nbsp;|&nbsp; <strong>Team:</strong> 500+ &nbsp;|&nbsp; <strong>Website:</strong> deerwalk.com</p>

<p>Healthcare analytics is one of the most specialised, high-stakes domains in enterprise technology — and Deerwalk Services has made Nepal a recognised player in it. As the Kathmandu-based technology arm of <strong>Cedar Gate Technologies</strong>, Deerwalk employs 500+ data scientists, software engineers, and healthcare IT specialists working on systems that directly influence healthcare outcomes in America.</p>

<p>Their flagship work is in <strong>Population Health Management (PHM)</strong> — systems that help US health insurers identify at-risk patients, manage chronic conditions, predict costly hospitalisations, and reduce overall healthcare costs. This is technically demanding, domain-specific, high-value work — and Nepal is doing it at world-class standards.</p>

<p><strong>Main Services:</strong> Population Health Management, Healthcare Data Analytics, Software Development &amp; Testing, IT Infrastructure Support, Business Process Support Services.</p>

<p><strong>Why they stand out:</strong> Deerwalk's integration into Cedar Gate's global operations means 500 Nepali engineers are working on the same systems trusted by major US health plans. That level of domain depth — combined with scale — makes Deerwalk one of Nepal's most significant contributions to global healthcare technology.</p>


<!-- ── Company 4: CloudFactory ── -->
<h3>#4 — CloudFactory: Powering the World's AI With Nepali Talent</h3>

<p><strong>Founded:</strong> 2010 &nbsp;|&nbsp; <strong>Offices:</strong> Nepal, USA, UK, Kenya &nbsp;|&nbsp; <strong>Workforce:</strong> 7,000+ &nbsp;|&nbsp; <strong>Clients:</strong> 700+ &nbsp;|&nbsp; <strong>Website:</strong> cloudfactory.com</p>

<p>Every AI model needs training data. Behind the labeled datasets that teach AI systems to see, hear, understand, and reason — there is often a team from <strong>CloudFactory</strong>. Founded in Nepal in 2010, CloudFactory has built one of the world's largest AI-focused human workforces, with <strong>7,000+ trained data analysts</strong> serving 700+ clients on four continents.</p>

<p>From annotating images for autonomous vehicle companies to moderating content for global social platforms, CloudFactory sits at the intersection of human intelligence and artificial intelligence. When you interact with an AI product, there is a meaningful chance that Nepali talent helped train it.</p>

<p><strong>Main Services:</strong> AI Data Annotation &amp; Labeling, Content Moderation, Audio/Video Transcription, Web Research, Human-in-the-Loop AI QA, AI Model Validation.</p>

<p><strong>Why they stand out:</strong> CloudFactory's scale is unmatched in Nepal — 7,000 workers, 700 clients, four-continent operations. And their mission extends beyond business: the company was founded to create economic opportunity for Nepali workers, proving that world-class AI services and social impact are not mutually exclusive.</p>


<!-- ── Company 5: Cotiviti Nepal ── -->
<h3>#5 — Cotiviti Nepal: Where Data Meets US Healthcare</h3>

<p><strong>Founded:</strong> 2004 &nbsp;|&nbsp; <strong>HQ:</strong> Kathmandu, Nepal &nbsp;|&nbsp; <strong>Parent:</strong> Cotiviti Inc. (USA) &nbsp;|&nbsp; <strong>Team:</strong> 600+ &nbsp;|&nbsp; <strong>Website:</strong> cotiviti.com.np</p>

<p>If you are covered by a major US health insurance plan, data processed by Cotiviti Nepal has almost certainly touched your claims. As the Nepal subsidiary of US-based <strong>Cotiviti Inc.</strong>, this company employs 600+ engineers and data specialists in Kathmandu working on healthcare payment accuracy, analytics, and decision intelligence.</p>

<p>Cotiviti's global parent serves <strong>180+ healthcare payers</strong> — meaning nearly every major US health insurance company relies on systems that Nepali engineers help build and maintain. Accurate claims processing and data analytics save billions of dollars in the US healthcare system annually.</p>

<p><strong>Main Services:</strong> Healthcare Informatics Solutions, Payment Accuracy Analytics, Software Design, Development &amp; Testing, Data Processing &amp; Decision Analytics, Business Intelligence.</p>

<p><strong>Why they stand out:</strong> Working as the Nepal arm of one of the US's most trusted healthcare analytics firms puts Cotiviti Nepal's 600 engineers in a rare position — doing genuinely consequential, high-impact work from Kathmandu.</p>


<!-- ── Company 6: Fusemachines ── -->
<h3>#6 — Fusemachines: Nepal's First NASDAQ-Listed Tech Company</h3>

<p><strong>Founded:</strong> 2013 &nbsp;|&nbsp; <strong>HQ:</strong> New York, USA (Nepal Operations) &nbsp;|&nbsp; <strong>Founder:</strong> Dr. Sameer Maskey (Columbia University) &nbsp;|&nbsp; <strong>NASDAQ:</strong> FUSE (~$200M valuation) &nbsp;|&nbsp; <strong>Website:</strong> fusemachines.com</p>

<p>In 2023, something historic happened: a company built by a Nepali entrepreneur rang the NASDAQ opening bell. <strong>Fusemachines</strong>, founded by Dr. Sameer Maskey — a Columbia University professor and AI researcher — became the <strong>first company of Nepali origin to list on NASDAQ</strong>, at an approximate valuation of $200 million.</p>

<p>Fusemachines builds enterprise AI solutions, consults on AI transformation strategy, and provides AI education through its proprietary AI Studio platform. Their clients include Fortune 500 companies across multiple industries.</p>

<p><strong>Key Products:</strong></p>
<ul>
  <li><strong>AI Studio</strong> — Proprietary enterprise AI development platform</li>
  <li><strong>AI Engines</strong> — Configurable AI solutions for enterprise workflows</li>
</ul>

<p><strong>Why they stand out:</strong> The NASDAQ listing is not just a corporate milestone — it is a statement to the world that Nepali entrepreneurs can build billion-dollar AI companies. It changes what young Nepali engineers believe is possible.</p>


<!-- ── Company 7: Young Innovations ── -->
<h3>#7 — Young Innovations: Tech for Global Development</h3>

<p><strong>Founded:</strong> 2007 &nbsp;|&nbsp; <strong>HQ:</strong> Lalitpur, Nepal &nbsp;|&nbsp; <strong>Website:</strong> younginnovations.com.np</p>

<p>Most IT companies chase enterprise clients in the US or Europe. Young Innovations (YIPL) made a fundamentally different bet: <strong>civic technology and international development</strong>. They build digital tools that improve transparency, accountability, and governance in developing nations — and they do it at a global scale.</p>

<p>Their portfolio reads like a catalogue of impact technology: AidStream (international aid transparency), Resource Contracts (mining and petroleum contract tracking used in 60+ countries), Susasan (Nepal's government transparency platform), and the technology backbone for Nepal's <strong>National Population and Housing Census 2021</strong>.</p>

<p><strong>Notable Projects:</strong></p>
<ul>
  <li><strong>AidStream</strong> — IATI aid transparency publishing tool (used by international NGOs globally)</li>
  <li><strong>Resource Contracts</strong> — Mining and petroleum contract transparency platform (60+ countries)</li>
  <li><strong>Susasan</strong> — Nepal government public transparency initiative</li>
  <li><strong>National Census 2021</strong> — Technology platform for Nepal's national population census</li>
</ul>

<p><strong>Why they stand out:</strong> Young Innovations proves Nepal can build technology that changes governance, not just software that runs businesses. Their tools are used by international organisations, governments, and NGOs worldwide.</p>


<!-- ── Company 8: Janaki Technology ── -->
<h3>#8 — Janaki Technology: Behind Sparrow SMS &amp; Khalti</h3>

<p><strong>Founded:</strong> 2007 &nbsp;|&nbsp; <strong>HQ:</strong> Lalitpur, Nepal &nbsp;|&nbsp; <strong>Website:</strong> janakitech.com</p>

<p>Some tech companies build one successful product. Janaki Technology built three. The team behind <strong>Sparrow SMS</strong> (Nepal's dominant enterprise messaging platform), <strong>Khalti</strong> (Nepal's second-largest digital wallet), and <strong>Picovico</strong> (a video creation SaaS tool) is one of Nepal's most impressive product companies.</p>

<p>Sparrow SMS alone serves <strong>7,000+ businesses</strong>, processing billions of messages annually for clients including Daraz, Pathao, Nepal Electricity Authority, UNICEF, and the Nepal Government. With a 99% delivery rate, it is the backbone of Nepal's business SMS infrastructure.</p>

<p><strong>Key Products:</strong></p>
<ul>
  <li><strong>Sparrow SMS</strong> — Nepal's leading enterprise SMS gateway (7,000+ businesses)</li>
  <li><strong>Khalti</strong> — Nepal's second-largest digital wallet (launched 2017)</li>
  <li><strong>Picovico</strong> — Video creation SaaS platform</li>
</ul>

<p><strong>Notable Clients:</strong> Daraz, Pathao, Nepal Electricity Authority (NEA), Nepal Government ministries, UNICEF Nepal, Machhapuchchhre Bank.</p>

<p><strong>Why they stand out:</strong> Product diversification is rare for Nepal-based IT companies. Janaki's ability to build and scale multiple successful products across communications, fintech, and media demonstrates serious engineering depth combined with sharp product thinking.</p>


<!-- ── Company 9: Verisk Nepal ── -->
<h3>#9 — Verisk Nepal: Global Insurance Analytics From Kathmandu</h3>

<p><strong>Founded:</strong> 2009 &nbsp;|&nbsp; <strong>HQ:</strong> Kathmandu, Nepal &nbsp;|&nbsp; <strong>Parent:</strong> Verisk Analytics (NASDAQ: VRSK, Fortune 500) &nbsp;|&nbsp; <strong>Website:</strong> verisknepal.com.np</p>

<p>Verisk Nepal is the Kathmandu-based technology arm of <strong>Verisk Analytics</strong> — a Fortune 500 data analytics company that provides risk assessment solutions to the global insurance industry. Established in 2009, it has operated for 15+ years as one of Nepal's most stable, professionally run, and technically mature IT organisations.</p>

<p>Engineers here work using industry-standard methodologies — Agile, Scrum, Kanban, Kaizen — on software used by insurers worldwide. The company provides comprehensive software development, product delivery, QA, and IT infrastructure support flowing into Verisk's global ecosystem.</p>

<p><strong>Main Services:</strong> Software Development &amp; Product Delivery, Software Testing &amp; QA, IT Infrastructure Support, Data &amp; Analytical Services, Insurance Technology Solutions.</p>

<p><strong>Why they stand out:</strong> Working as part of a Fortune 500 company exposes engineers to enterprise-scale software practices and global quality benchmarks. Fifteen years of continuous operations — rare in Nepal's IT sector — speaks to genuine organisational maturity.</p>


<!-- ── Company 10: Yomari ── -->
<h3>#10 — Yomari Information Services: Nepal's IT Veteran</h3>

<p><strong>Founded:</strong> 1997 &nbsp;|&nbsp; <strong>HQ:</strong> Lalitpur, Nepal &nbsp;|&nbsp; <strong>Experience:</strong> 25+ years &nbsp;|&nbsp; <strong>Website:</strong> yomari.com.np</p>

<p>When most of Nepal's current IT stars were still startups, <strong>Yomari Information Services</strong> was already building enterprise software. Founded in 1997 — before the dot-com boom, before eSewa, before Nepal had a smartphone culture — Yomari is Nepal's most experienced active IT firm with over <strong>25 years of uninterrupted operations</strong>.</p>

<p>Their group structure includes <strong>LIS Nepal</strong> (established 2014), specialising in retail management software and Business Intelligence solutions. Their multi-decade track record in system integration, IT consulting, data warehousing, and enterprise software makes Yomari a trusted name in Nepal's corporate sector.</p>

<p><strong>Main Services:</strong> Software Development &amp; IT Consulting, Business Intelligence &amp; Analytics, Data Warehousing, Hardware &amp; Networking, System Integration, Retail Software &amp; ERP (via LIS Nepal).</p>

<p><strong>Why they stand out:</strong> Longevity in Nepal's IT market is genuinely rare. Yomari's 25+ year track record signals sustained client trust and the ability to adapt through every technology shift — from the pre-internet era to cloud computing.</p>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  COMPARISON TABLE                                       -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>Top 10 IT Companies in Nepal — Quick Comparison (2025)</h2>

<div style="overflow-x:auto;">
<table style="width:100%;border-collapse:collapse;font-size:.9rem;">
  <thead>
    <tr style="border-bottom:2px solid rgba(99,102,241,.3);">
      <th style="text-align:left;padding:10px 12px;color:#a5b4fc;font-size:.7rem;text-transform:uppercase;letter-spacing:.1em;">Company</th>
      <th style="text-align:left;padding:10px 12px;color:#a5b4fc;font-size:.7rem;text-transform:uppercase;letter-spacing:.1em;">Founded</th>
      <th style="text-align:left;padding:10px 12px;color:#a5b4fc;font-size:.7rem;text-transform:uppercase;letter-spacing:.1em;">Specialisation</th>
      <th style="text-align:left;padding:10px 12px;color:#a5b4fc;font-size:.7rem;text-transform:uppercase;letter-spacing:.1em;">Team Size</th>
      <th style="text-align:left;padding:10px 12px;color:#a5b4fc;font-size:.7rem;text-transform:uppercase;letter-spacing:.1em;">Primary Market</th>
    </tr>
  </thead>
  <tbody>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">F1Soft International</td>
      <td style="padding:10px 12px;color:#64748b;">2004</td>
      <td style="padding:10px 12px;color:#94a3b8;">Fintech / Digital Banking</td>
      <td style="padding:10px 12px;color:#94a3b8;">600+</td>
      <td style="padding:10px 12px;color:#94a3b8;">Nepal</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Leapfrog Technology</td>
      <td style="padding:10px 12px;color:#64748b;">2010</td>
      <td style="padding:10px 12px;color:#94a3b8;">AI / Healthcare / Web Dev</td>
      <td style="padding:10px 12px;color:#94a3b8;">300+</td>
      <td style="padding:10px 12px;color:#94a3b8;">USA / Global</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Deerwalk Services</td>
      <td style="padding:10px 12px;color:#64748b;">2010</td>
      <td style="padding:10px 12px;color:#94a3b8;">Healthcare IT Analytics</td>
      <td style="padding:10px 12px;color:#94a3b8;">500+</td>
      <td style="padding:10px 12px;color:#94a3b8;">USA</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">CloudFactory</td>
      <td style="padding:10px 12px;color:#64748b;">2010</td>
      <td style="padding:10px 12px;color:#94a3b8;">AI Training Data</td>
      <td style="padding:10px 12px;color:#94a3b8;">7,000+</td>
      <td style="padding:10px 12px;color:#94a3b8;">Global</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Cotiviti Nepal</td>
      <td style="padding:10px 12px;color:#64748b;">2004</td>
      <td style="padding:10px 12px;color:#94a3b8;">Healthcare Analytics</td>
      <td style="padding:10px 12px;color:#94a3b8;">600+</td>
      <td style="padding:10px 12px;color:#94a3b8;">USA</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Fusemachines</td>
      <td style="padding:10px 12px;color:#64748b;">2013</td>
      <td style="padding:10px 12px;color:#94a3b8;">Enterprise AI (NASDAQ)</td>
      <td style="padding:10px 12px;color:#94a3b8;">200+</td>
      <td style="padding:10px 12px;color:#94a3b8;">Global</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Young Innovations</td>
      <td style="padding:10px 12px;color:#64748b;">2007</td>
      <td style="padding:10px 12px;color:#94a3b8;">Civic Tech / Gov Tech</td>
      <td style="padding:10px 12px;color:#94a3b8;">100+</td>
      <td style="padding:10px 12px;color:#94a3b8;">Global (Dev Sector)</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Janaki Technology</td>
      <td style="padding:10px 12px;color:#64748b;">2007</td>
      <td style="padding:10px 12px;color:#94a3b8;">Fintech / Communications</td>
      <td style="padding:10px 12px;color:#94a3b8;">200+</td>
      <td style="padding:10px 12px;color:#94a3b8;">Nepal</td>
    </tr>
    <tr style="border-bottom:1px solid rgba(255,255,255,.05);">
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Verisk Nepal</td>
      <td style="padding:10px 12px;color:#64748b;">2009</td>
      <td style="padding:10px 12px;color:#94a3b8;">Insurance Technology</td>
      <td style="padding:10px 12px;color:#94a3b8;">300+</td>
      <td style="padding:10px 12px;color:#94a3b8;">USA</td>
    </tr>
    <tr>
      <td style="padding:10px 12px;color:#f1f5f9;font-weight:600;">Yomari Info Services</td>
      <td style="padding:10px 12px;color:#64748b;">1997</td>
      <td style="padding:10px 12px;color:#94a3b8;">Enterprise IT / BI</td>
      <td style="padding:10px 12px;color:#94a3b8;">100+</td>
      <td style="padding:10px 12px;color:#94a3b8;">Nepal</td>
    </tr>
  </tbody>
</table>
</div>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  SECTION 4: Future of IT in Nepal                       -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>The Future of IT in Nepal: What the Next Decade Looks Like</h2>

<p>Nepal's tech story is still in its early chapters. Here is what the next decade holds — and why the trajectory is genuinely exciting.</p>

<h3>AI and Machine Learning Will Drive the Next Wave</h3>
<p>Companies like Leapfrog, Fusemachines, and CloudFactory are already building significant AI capabilities inside Nepal. As global enterprise demand for AI services accelerates, Nepal's cost-competitive AI talent pool positions the country to capture a far larger share. Expect more Nepal-based AI product companies — and more NASDAQ stories — over the next five years.</p>

<h3>Global Capability Centers (GCCs) Are Coming</h3>
<p>India currently hosts over 1,600 Global Capability Centers — internal tech hubs that Fortune 500 companies build in lower-cost markets. Nepal has a handful. The government is explicitly targeting this segment, and the economics are compelling: skilled English-speaking engineers at 40–60% below US rates. The next wave of GCC investment could transform Kathmandu's tech skyline.</p>

<h3>Fintech Will Deepen Into Embedded Finance</h3>
<p>With eSewa, Khalti, Fonepay, and ConnectIPS rapidly expanding, Nepal's digital payments ecosystem is heading toward near-complete digitisation. The next frontier — embedded finance, digital lending, buy-now-pay-later — will require sophisticated software infrastructure. Nepal's fintech companies are well-positioned to build it.</p>

<h3>Government Targets for 2025–2035</h3>
<ul>
  <li><strong>Rs 30 Billion+</strong> — Target IT service exports over 10 years</li>
  <li><strong>500,000</strong> — Target direct IT sector jobs</li>
  <li><strong>1,000,000</strong> — Target indirect IT-related jobs</li>
  <li><strong>$40 Million</strong> — ADB digital transformation investment (2026)</li>
</ul>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  SECTION 5: Career Opportunities                        -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>Career Opportunities in Nepal's IT Sector (2025)</h2>

<p>Nepal's IT job market in 2025 is the strongest it has ever been. The answer to building a successful tech career increasingly does not require emigrating.</p>

<h3>Roles in High Demand</h3>
<ul>
  <li><strong>Full-Stack Web Developers</strong> — React, Vue.js, Node.js, Python/Django, Laravel</li>
  <li><strong>AI / ML Engineers</strong> — TensorFlow, PyTorch, LLM fine-tuning, RAG systems</li>
  <li><strong>Data Scientists &amp; Analysts</strong> — Python, SQL, Power BI, Tableau</li>
  <li><strong>DevOps &amp; Cloud Engineers</strong> — AWS, Kubernetes, CI/CD pipelines</li>
  <li><strong>Healthcare IT Specialists</strong> — HL7, FHIR, HIPAA-compliant systems</li>
  <li><strong>Cybersecurity Professionals</strong> — SIEM, penetration testing, compliance</li>
  <li><strong>UX/UI Designers</strong> — Figma, design systems, accessibility</li>
</ul>

<h3>Salary Landscape</h3>
<p>Entry-level software engineers at top companies like Leapfrog, Deerwalk, or Cotiviti typically earn NPR 40,000–80,000/month. Senior engineers with 5+ years of experience can command NPR 150,000–300,000/month. Remote work for international clients can pay 3–5× more.</p>

<h3>Learning &amp; Development Ecosystem</h3>
<p>Institutions like Kathmandu University, Tribhuvan University, and private bootcamps are producing increasingly job-ready graduates. Fusemachines' AI education programs, local hackathons (Barcamp Kathmandu), and the startup ecosystem continue to sharpen Nepal's talent pool year over year.</p>


<!-- ═══════════════════════════════════════════════════════ -->
<!--  CLOSING CTA                                            -->
<!-- ═══════════════════════════════════════════════════════ -->
<h2>Final Thoughts</h2>

<p>Nepal's IT sector is not just growing — it is maturing. From offshore outsourcing shops to product companies with global clients, from local digital wallets to NASDAQ listings, the journey of the past two decades has been remarkable. The companies on this list are the proof points.</p>

<p>Whether you are a business looking for a reliable software development partner, a student weighing a career in tech, or an investor evaluating emerging markets — Nepal's IT industry deserves serious attention in 2025 and beyond.</p>

<blockquote>As a web developer based in Nepal, I have watched this industry grow firsthand. The quality of talent, the ambition of founders, and the sophistication of the products being built here continue to surprise and inspire.</blockquote>

        </div>

        @if($otherPosts->isNotEmpty())
        <div class="mt-16 pt-10" style="border-top: 1px solid var(--line);">
            <h2 class="font-display text-2xl font-bold mb-6" style="color: var(--ink);">More Articles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                @foreach($otherPosts as $other)
                <a href="{{ route('blog.' . $other['slug']) }}" class="glass-card p-5 block">
                    <p class="text-xs font-semibold mb-2" style="color: var(--ink-faint);">{{ $other['date'] }} · {{ $other['reading_time'] }} min read</p>
                    <h3 class="font-display text-base font-bold" style="color: var(--ink);">{{ $other['title'] }}</h3>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</section>

@include('partials.services-cta', ['heading' => 'next project'])
@endsection

@push('styles')
<style>
.post-content { color: var(--ink-dim); font-size: 1.05rem; line-height: 1.85; }
.post-content > * + * { margin-top: 1rem; }
.post-content h2, .post-content h3, .post-content h4 { font-family: 'Rajdhani', sans-serif; color: var(--ink); font-weight: 700; line-height: 1.3; margin-top: 1.8rem; margin-bottom: 0.7rem; }
.post-content h2 { font-size: 1.6rem; }
.post-content h3 { font-size: 1.25rem; }
.post-content h4 { font-size: 1.1rem; }
.post-content p { margin: 0.9rem 0; }
.post-content strong { color: var(--ink); font-weight: 700; }
.post-content ul, .post-content ol { margin: 1rem 0; padding-left: 1.4rem; }
.post-content ul { list-style: disc; }
.post-content ol { list-style: decimal; }
.post-content li { margin: 0.45rem 0; }
.post-content a { color: var(--accent); text-decoration: underline; text-underline-offset: 3px; }
.post-content blockquote { margin: 1.25rem 0; padding: 0.85rem 1rem; border-left: 3px solid var(--accent); background: var(--accent-soft); border-radius: 8px; color: var(--ink); }
.post-content img { display: block; max-width: 100%; height: auto; border-radius: 12px; border: 1px solid var(--line); margin: 1rem 0; }
.post-content code { background: var(--bg-soft); color: var(--ink); border-radius: 6px; padding: 2px 6px; font-size: 0.92em; }
.post-content pre { background: #14161a; color: #f3efe7; border-radius: 12px; padding: 1rem; overflow-x: auto; margin: 1.1rem 0; }
.post-content pre code { background: transparent; padding: 0; }
.cta-kk-banner { background: var(--bg-soft); border: 1px solid var(--line); border-radius: 28px; padding: 48px 36px; box-shadow: 6px 7px 0 0 var(--accent); }
@media (min-width: 768px) { .cta-kk-banner { padding: 64px 60px; } }
</style>
@endpush