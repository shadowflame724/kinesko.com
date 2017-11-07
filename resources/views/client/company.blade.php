@extends('client.template.layout')

@section('page-title', $page->{'title' . $langSuf})


@section('content')

<!-- start of company-page -->
<section id="company-page">
    <div class="main-top-container bg-cont">
        <div class="container">
            <div class="page-head">
                <div class="bread-crumbs">
                    <a href="{{ route('client.index') }}">главная</a>
                    <span class="active">компания</span>
                </div>
                <h1 class="page-title">компания</h1>
            </div>
        </div>
    </div>

    <!-- start of our-team -->
    <div class="our-team-wrapper triangle-left">
        <div class="container">
            <div class="our-team">
                <div class="team-group align-bottom">
                    <div class="team-member empty">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member empty">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Алексей</span> Глаголев</p>
                            <p class="member-position">Front-End developer</p>
                        </div>
                    </div>
                    <div class="team-member empty">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Игорь</span> Гема</p>
                            <p class="member-position">Director</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Татьяна</span> Чайковская</p>
                            <p class="member-position">HR-manager</p>
                        </div>
                    </div>
                </div>
                <div class="team-group align-bottom">
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Игорь</span> Гема</p>
                            <p class="member-position">Director</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Андрей</span> Костюк</p>
                            <p class="member-position">Sales manager</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Яна</span> Галака</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                </div>

                <div class="team-text align-bottom">
                    <h2 class="section-header yellow-color">наша команда</h2>

                    <div class="info-block-cont">
                        <div class="text-cont black-color">
                            <p>
                            <span>
                                Наши дизайны умеют восхищать, вдохновлять, продавать и приносить прибыль.
                                Мы создаем дизайны, которыми люди хотят пользоваться.
                            </span>
                            </p>
                            <p>
                                Чтобы дизайн был эффективным с точки зрения бизнеса, он должен вызывать эмоции.
                                Мы очень хорошо в этом разбираемся. Убедитесь сами.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- 1 -->
                <div class="team-group">
                    <div class="team-member empty dark">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member wanted">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-wanted">wanted!</p>
                            <p class="member-position">Back-End developer</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Олег</span> Сметана</p>
                            <p class="member-position">SEO specialist</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Ирина</span> Калинку</p>
                            <p class="member-position">Graphic Designer</p>
                        </div>
                    </div>
                </div>
                <!-- 2 -->
                <div class="team-group">
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Кирилл</span> Фоминов</p>
                            <p class="member-position">Graphic Designer</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Михаил</span> Козицкий</p>
                            <p class="member-position">Account manager</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                </div>
                <!-- 3 -->
                <div class="team-group">
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Алексей</span> Глаголев</p>
                            <p class="member-position">Front-End developer</p>
                        </div>
                    </div>
                    <div class="team-member wanted">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-wanted">wanted!</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Мария</span> Баранова</p>
                            <p class="member-position">Sales manager</p>
                        </div>
                    </div>
                </div>
                <!-- 4 -->
                <div class="team-group">
                    <div class="team-member wanted">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-wanted">wanted!</p>
                            <p class="member-position">Sales manager</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Алексей</span> Глаголев</p>
                            <p class="member-position">Front-End developer</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Денис</span> Дидковский</p>
                            <p class="member-position">Sales manager</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Мария</span> Волошина</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                </div>
                <!-- 5 -->
                <div class="team-group">
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Алексей</span> Глаголев</p>
                            <p class="member-position">Front-End developer</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Глеб</span> Остриков</p>
                            <p class="member-position">Back-End developer</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Анна</span> Слёз</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                </div>
                <!-- 6 -->
                <div class="team-group fake-group">
                    <div class="team-member empty">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member empty">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Алексей</span> Глаголев</p>
                            <p class="member-position">Front-End developer</p>
                        </div>
                    </div>
                    <div class="team-member hidden">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Михаил</span> Козицкий</p>
                            <p class="member-position">Account manager</p>
                        </div>
                    </div>
                    <div class="team-member hidden">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Анна</span> Слёз</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                </div>
                <!-- 7 -->
                <div class="team-group">
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Дария</span> Мех</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                    <div class="team-member">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Алексей</span> Глаголев</p>
                            <p class="member-position">Front-End developer</p>
                        </div>
                    </div>
                    <div class="team-member hidden">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Михаил</span> Козицкий</p>
                            <p class="member-position">Account manager</p>
                        </div>
                    </div>
                    <div class="team-member hidden">
                        <div class="front"></div>
                        <div class="back">
                            <p class="member-name"><span>Анна</span> Слёз</p>
                            <p class="member-position">Copywriter</p>
                        </div>
                    </div>
                </div>

                <div class="send-sv-cont">
                    <a href="/" class="skew-right gl-transparent-btn send-sv-btn order-form-btn">
                        <span class="skew-left">отправить резюме</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end of our-team-wrapper -->

    <!-- start of our-hobbies -->
    <div class="our-hobbies triangle-right">
        <div class="container">
            <div class="row info-block-cont">
                <div class="col-md-6 title-cont">
                    <h3 class="title">
                        Мы больше чем студия
                    </h3>
                </div>
                <div class="col-md-6 text-cont">
                    <p>
                        <span>
                            Наши дизайны умеют восхищать, вдохновлять, продавать и приносить прибыль.
                            Мы создаем дизайны, которыми люди хотят пользоваться.
                        </span>
                    </p>
                    <p class="for-read-more">
                        Чтобы дизайн был эффективным с точки зрения бизнеса, он должен вызывать эмоции.
                        Мы очень хорошо в этом разбираемся. Убедитесь сами.
                    </p>
                    <span class="read-more-btn">читать дальше...</span>
                </div>
            </div>

            <h3 class="section-header white-color">наши хобби</h3>

            <div class="hobby-icons-cont">
                <div class="hobby-item-cont">
                    <div class="hobby-item active" data-men="5" data-women="7">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="3" data-women="6">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="8" data-women="10">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="5" data-women="3">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="11" data-women="8">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="4" data-women="9">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="2" data-women="6">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="6" data-women="8">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
                <div class="hobby-item-cont">
                    <div class="hobby-item" data-men="15" data-women="15">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </div>
                </div>
            </div>

            <div class="row employees">
                <div class="col-md-6 men">
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                </div>

                <div class="col-md-6 women">
                    <span class="item active">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                    <span class="item">
                        <i class="icon"></i>
                        <i class="icon icon-hover"></i>
                    </span>
                </div>
            </div>

        </div>
    </div>
    <!-- end of our-hobbies -->


    {{--//= template/portfolio-block-small.html--}}
    @widget('PortfolioSmall')

</section>
<!-- end of company-page -->
@stop

@section('page-scripts')
<script src="/js/company.js"></script>
@stop