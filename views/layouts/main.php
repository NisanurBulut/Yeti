<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/css/semantic.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" integrity="sha512-8bHTC73gkZ7rZ7vpqUQThUDhqcNFyYi2xgDgPDHc+GXVGHXq+xPjynxIopALmOPqzo9JZj0k6OqqewdGO3EsrQ==" crossorigin="anonymous" />
</head>
<body>
<div class="ui purple inverted borderless top fixed fluid pointing menu">
        <a class="header item" href="{{ route('welcome') }}">AMON</a>
        <div class="right menu">

                <div class="item">
                    <div class="ui small input"><input placeholder="Search..." /></div>
                </div>
                <a class="item" href="{{ route('dashboard.index') }}">
                    <i class="bolt icon large tooltip" data-content="Dashboard"></i>
                </a>
                    <a class="item" href="{{ route('users.index') }}">
                        <i class="users icon large tooltip" data-content="Kullanıcılar"></i>
                    </a>
                    <a class="item" href="/apps">
                        <i class="rocket icon large tooltip" data-content="Uygulamalar"></i>
                    </a>

                <a class="item" href="{{ route('demands.index') }}">
                    <i class="tasks icon large tooltip" data-content="Talepler"></i>
                </a>
                <div role="listbox" aria-expanded="false" class="ui item inline dropdown" tabindex="0">
                    <div aria-atomic="true" aria-live="polite" role="alert" class="divider text">
                        <img src="" class="ui avatar image" />
                        Nisanur
                    </div>
                    <i aria-hidden="true" class="dropdown icon"></i>
                    <div class="menu transition">
                        <div style="cursor:pointer;" role="option" aria-checked="true" aria-selected="true" class="item">
                            <a class="ui" href="{{ route('auth.storeLogout') }}">
                                <i class="question circle icon large tooltip purple" data-content="Destek"></i>
                                <label class="text ui purple label basic">Destek</label>
                            </a>
                        </div>
                        <div style="cursor:pointer;" role="option" aria-checked="true" aria-selected="true" class="item">
                            <a class="ui" href="{{ route('auth.storeLogout') }}">
                                <i type="submit" class="sign out purple alternate icon large tooltip"
                                    data-content="Oturumu kapat"></i>
                                <label class="text ui purple label basic">Oturumu kapat</label>
                            </a>
                        </div>
                    </div>
                </div>

        </div>
    </div>
</body>
{{ content }}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js" integrity="sha512-dqw6X88iGgZlTsONxZK9ePmJEFrmHwpuMrsUChjAw1mRUhUITE5QU9pkcSox+ynfLhL15Sv2al5A0LVyDCmtUw==" crossorigin="anonymous"></script>
</html>