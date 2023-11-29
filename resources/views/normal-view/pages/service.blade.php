@extends('normal-view.layout.base')

@section('title')
    | Services
@endsection

@section('content')
    <section class="section-big main-color mt-5">
        <div class="container">

            <div class="row">
                <div class="col-md-12 pb-20 text-center">
                    <h2 class="section-title mb-10"><span> Welcome to <strong class="text-primary">Ferry Ticket</strong>
                            Services
                        </span></h2>
                    <p class="section-sub-title">
                        Explore our ferry ticket services for a seamless travel experience.
                    </p>
                    <div class="exp-separator center-separator">
                        <div class="exp-separator-inner">
                        </div>
                    </div>

                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <ul class="i-list medium">
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-desktop"></i> </div>

                            <div class="icon-content">
                                <h3 class="title">Fully Responsive Design</h3>
                                <p class="sub-title">
                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend ac, enim ante, dapibus in.
                                </p>
                            </div>
                            <div class="iconlist-timeline"></div>
                        </li>
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-code"></i> </div>

                            <div class="icon-content">
                                <h3 class="title">Easy &amp; Clean Code</h3>
                                <p>
                                    Aenean vulputate tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.
                                </p>
                            </div>
                            <div class="iconlist-timeline"></div>
                        </li>
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-paper-plane"></i> </div>

                            <div class="icon-content">
                                <h3 class="title">24/7 Customer Support</h3>
                                <p>
                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat, eleifend ac, enim lorem ante, dapibus in.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="i-list medium">
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-gem"></i> </div>
                            <div class="icon-content">
                                <h3 class="title">Endless Possibilites</h3>
                                <p class="sub-title">
                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend Aliquam lorem ante, dapibus in.
                                </p>
                            </div>
                            <div class="iconlist-timeline"></div>
                        </li>
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-recycle"></i> </div>
                            <div class="icon-content">
                                <h3 class="title">Free Lifetime Updates</h3>
                                <p>
                                    Aenean eleifend tellus. Aenean leo ligula, porttitor eu
                                    consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.
                                </p>
                            </div>
                            <div class="iconlist-timeline"></div>
                        </li>
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-check"></i> </div>
                            <div class="icon-content">
                                <h3 class="title">Clean &amp; Modern Design</h3>
                                <p>
                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend enim lorem ante, dapibus in.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="i-list medium">
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 fab fa-codepen"></i> </div>
                            <div class="icon-content">
                                <h3 class="title">Useful Shortcodes</h3>
                                <p class="sub-title">
                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend ac, enim. Aliquam lorem ante.
                                </p>
                            </div>
                            <div class="iconlist-timeline"></div>
                        </li>
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-newspaper"></i> </div>
                            <div class="icon-content">
                                <h3 class="title">Multipurpose Concept</h3>
                                <p>
                                    Aenean vulputate eleifend tellus ligula, porttitor eu,
                                    consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in.
                                </p>
                            </div>
                            <div class="iconlist-timeline"></div>
                        </li>
                        <li class="i-list-item">
                            <div class="icon"> <i class="mt-4 far fa-heart"></i> </div>
                            <div class="icon-content">
                                <h3 class="title">Crafted With Love</h3>
                                <p>
                                    Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu,
                                    consequat vitae, eleifend ac lorem ante, dapibus in.
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

<style>
    ul.i-list {
        padding-left: 0;
        list-style: none;
    }

    ul.i-list .list-title {
        display: inline-block;
        position: absolute;
    }

    ul.i-list li {
        padding: 2px 0px;
    }

    ul.i-list i.fa {
        margin-right: 7px;
    }

    ul.i-list .list-item {
        margin-top: 3px;
        display: inline-block;
    }

    ul.i-list.filled i.fa {
        color: white;
        font-size: 9px;
        padding: 5px;
        border-radius: 50%;
    }

    ul.e-icon-list.filled li {
        padding: 2px 0px;
        line-height: 24px;
    }

    ul.i-list.underline li {
        padding: 6px 0px;
        border-bottom: 1px solid #eee;
    }

    ul.i-list.medium li {
        padding-bottom: 25px;
        position: relative;
    }

    ul.i-list.medium .icon {
        margin-right: 25px;
        color: white;
        font-size: 25px;
        text-align: center;
        line-height: 68px;
        width: 68px;
        height: 68px;
        border-radius: 50%;
        box-shadow: 0 5px 16px rgba(0, 0, 0, .28);
        position: relative;
        z-index: 1;
    }

    ul.i-list.medium .icon i.fa {
        margin: 0;
    }

    ul.i-list.medium.bordered .icon {
        background: white;
        color: inherit;
        border: 2px solid #8fc135;
        font-size: 26px;
        color: #8fc135;
        position: relative;
        z-index: 1;
        box-shadow: 0 8px 22px rgba(0, 0, 0, .28);
    }

    ul.i-list.medium .list-item {
        text-transform: uppercase;
    }

    ul.i-list.large .icon {
        margin-right: 30px;
        background: #d0d0d0;
        color: white;
        font-size: 30px;
        text-align: center;
        line-height: 80px;
        width: 80px;
        height: 80px;
        border-radius: 50%;
        box-shadow: 0 8px 22px rgba(0, 0, 0, .28);
    }

    ul.i-list.large .icon i.fa {
        margin: 0;
    }

    ul.i-list.large.bordered .icon {
        background: inherit;
        color: inherit;
        border: 2px solid #8fc135;
        font-size: 30px;
        color: #8fc135;
    }

    ul.i-list.large .list-item {
        text-transform: uppercase;
    }

    ul.i-list .icon {
        float: left;
    }

    ul.i-list.right {
        text-align: right;
    }

    ul.i-list.right .icon {
        float: right;
    }

    ul.i-list.right .icon {
        float: right;
        margin-right: 0;
        margin-left: 25px;
    }

    ul.i-list.large.right .icon {
        float: right;
        margin-right: 0;
        margin-left: 30px;
    }

    ul.i-list.large li {
        margin-bottom: 25px;
    }

    ul.i-list .icon-content {
        overflow: hidden;
    }

    ul.i-list .icon-content .title {
        margin-top: 5px;
        margin-bottom: 10px;
    }

    .left-line .iconlist-timeline {
        left: auto;
        right: 35px;
    }

    .iconlist-timeline {
        position: absolute;
        top: 1%;
        left: 32px;
        width: 1px;
        height: 99%;
        border-right-width: 1px;
        border-right-style: dashed;
        height: 100%;
        border-color: #ccc;
    }

    .icon {
        background-color: #0cb4ce;
    }

    .separator,
    .testimonial-two,
    .exp-separator-inner {
        border-color: #0cb4ce;
    }

    .exp-separator {
        border-color: #0cb4ce;
        border-top-width: 2px;
        margin-top: 10px;
        margin-bottom: 2px;
        width: 100%;
        max-width: 55px;
        border-top-style: solid;
        height: auto;
        clear: both;
        position: relative;
        z-index: 11;
    }

    .section-sub-title {
        font-size: 18px;
        margin-bottom: 20px;
        font-weight: 400;
        font-family: Poppins;
    }

    .section-title {
        font-size: 32px;
        font-weight: 600;
        margin-top: 0.45em;
        margin-bottom: 0.35em;
        color: #303133;
        font-family: Poppins;
        letter-spacing: -0.02em;
    }

    .pb-20 {
        padding-bottom: 20px !important;
    }

    .text-center {
        text-align: center !important;
    }

    .center-separator .exp-separator-inner,
    .center-separator.exp-separator {
        margin-left: auto;
        margin-right: auto;
    }
</style>
