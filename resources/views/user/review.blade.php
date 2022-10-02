<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Barlow+Semi+Condensed" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('dist/css/reviewPg.css')}}">
    <link href="https://fonts.googleapis.com/css2?family=Aboreto&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif&display=swap" rel="stylesheet">

    <style>
        body{
            /* text-transform:lowercase; */
            font-family: 'PT Serif', serif;

        }
        .progress:after,
.progress-2:after,
.progress-3:after,
.progress-4:after,
.progress-5:after {
    content: '';
    display: block;
    background: #e9770c;
    width: var(--afterBack5,80%);
    height: 100%;
    border-radius: 9px;
}
.progress-2:after {
    width: var(--afterBack4,80%);
}

.progress-3:after {
    width:var(--afterBack3,80%);
}

.progress-4:after {
    width: var(--afterBack2,80%);
}

.progress-5:after {
    width: var(--afterBack1,80%);
}
    </style>
</head>

<body style="background-image: url('{{asset('images/viber_image_2022-08-20_12-32-20-893 - Copy.jpg')}}')">
    <div class="title" style="background:rgba(0, 48, 96, 0.5)">
        <img src="{{asset('images/movieverse_logo.png')}}" alt="" style='width:80px'>
        <span style="font-size: 30px; margin-top:50px;" ><strong>MovieVerse</strong></span>
    </div>

    <div class="main-section" style="background:rgba(0, 48, 96, 0.5)">
        <a href="{{route('user#back')}}"><button class="btn text-white mt-2 mb-2" style="background:#003060">Back</button></a>

        <div class="hedding-title">
            <h1>Star Rating System</h1>
        </div>
        <div class="rating-part">
            <div class="average-rating">
                <h2 id=arating></h2>
                <div id='stara'></div>
                <p>Average Rating</p>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i class="fa fa-star-half-o" aria-hidden="true"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
            </div>
            <div class="loder-ratimg mt-2">
                <div class="progress mb-3" id=progress1></div>
                <div class="progress-2 mb-3" id=progress2></div>
                <div class="progress-3 mb-3" id=progress3></div>
                <div class="progress-4 mb-3" id=progress4></div>
                <div class="progress-5 " id=progress5></div>
            </div>
            <div class="start-part">
                <i aria-hidden="true" class="fa fa-star mb-0"></i>
                <i aria-hidden="true" class="fa fa-star mb-0"></i>
                <i aria-hidden="true" class="fa fa-star mb-0"></i>
                <i aria-hidden="true" class="fa fa-star mb-0"></i>
                <i aria-hidden="true" class="fa fa-star mb-0"></i>
                <span id='star5'></span><br>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <span id='star4'>60%</span><br>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <span id='star3'>40%</span><br>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <span id='star2'>20%</span><br>
                <i aria-hidden="true" class="fa fa-star"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <i aria-hidden="true" class="fa fa-star-o"></i>
                <span id='star1'>10%</span>
            </div>
            <div style="clear: both;"></div>
            <div class="reviews">
                <h1>Reviews</h1>
            </div>
            @foreach($data as $item)
            <div class="comment-part">
                <div class="user-img-part">
                    <div class="user-img">
                        <img src="{{asset('images/360_F_64676383_LdbmhiNM6Ypzb3FM4PPuFP9rHe7ri8Ju.jpg')}}">
                    </div>
                    <div class="user-text">

                        <p>{{$item->name}}</p>
                        <span>review</span>
                    </div>
                    <div style="clear: both;"></div>
                </div>
                <div class="comment">
                    @for($i = 0; $i<$item->star; $i++ )
                    <i aria-hidden="true" class="fa fa-star"></i>
                    @endfor
                    @for($i = 0; $i< (5-$item->star); $i++ )
                    <i aria-hidden="true" class="fa fa-star-o"></i>
                    @endfor

                    <p>{{$item->review}}</p>
                </div>
                <div style="clear: both;"></div>
            </div>
            @endforeach
            <div class=" text-white" style="width: fit-content; background-color:#003060;">{{$data->links()}}</div>

        </div>
    </div>
    <script>
            var data = {!! json_encode($star, JSON_HEX_TAG) !!};
            var sum = 0;
            for(let i = 0; i<data.length; i++)
            {
                sum += data[i];
            }
    var star = Math.round(sum  / data.length);
    var star5 = data.filter(checkstar5);
    function checkstar5(star)
    {
        return star == 5;
    }

    var percentage5 = Math.round((100 * star5['length']) / data.length);
    console.log(percentage5);

    var star4 = data.filter(checkstar4);
    function checkstar4(star)
    {
        return star == 4;
    }
    var percentage4 = Math.round((100 * star4['length']) / data.length);
    console.log(percentage4);

    var star3 = data.filter(checkstar3);
    function checkstar3(star)
    {
        return star == 3;
    }
    // console.log(star3);
    var percentage3 = Math.round((100 * star3['length']) / data.length);
    console.log(percentage3);

    var star2 = data.filter(checkstar2);
    function checkstar2(star)
    {
        return star == 2;
    }
    // console.log(star2);
    var percentage2 = Math.round((100 * star2['length']) / data.length);
    console.log(percentage2);

    var star1 = data.filter(checkstar1);
    function checkstar1(star)
    {
        return star == 1;
    }
    // console.log(star1);
    var percentage1 = Math.round((100 * star1['length']) / data.length);
    console.log(percentage1);
    document.getElementById('arating').innerHTML = star;
if(percentage1 < 10)
{
document.getElementById('star1').innerHTML = '&nbsp'+percentage1+'%';
}
else
{
document.getElementById('star1').innerHTML = percentage1+'%';
}
if(percentage2 < 10)
{
document.getElementById('star2').innerHTML = '&nbsp'+percentage3+'%';
}
else
{
document.getElementById('star2').innerHTML = percentage2+'%';
}
if(percentage3 < 10)
{
document.getElementById('star3').innerHTML = '&nbsp'+percentage3+'%';
}
else
{
document.getElementById('star3').innerHTML = percentage3+'%';
}
if(percentage4 < 10)
{
document.getElementById('star4').innerHTML = '&nbsp'+percentage4+'%';
}
else
{
document.getElementById('star4').innerHTML = percentage4+'%';
}
if(percentage5 < 10)
{
document.getElementById('star5').innerHTML = '&nbsp'+percentage5+'%';
}
else
{
document.getElementById('star5').innerHTML = percentage5+'%';
}
let progress5 = document.getElementById('progress5');
let progress4 = document.getElementById('progress4');
let progress3 = document.getElementById('progress3');
let progress2 = document.getElementById('progress2');
let progress1 = document.getElementById('progress1');

// box.style.setProperty('--boxAfterFontSize','50px');
let progress_after5 = window.getComputedStyle(progress5,'::after');
progress5.style.setProperty('--afterBack1',percentage1+'%')

let progress_after4 = window.getComputedStyle(progress4,'::after');
progress4.style.setProperty('--afterBack2',percentage2+'%')

let progress_after3 = window.getComputedStyle(progress3,'::after');
progress3.style.setProperty('--afterBack3',percentage3+'%')

let progress_after2 = window.getComputedStyle(progress2,'::after');
progress2.style.setProperty('--afterBack4',percentage4+'%')

let progress_after1 = window.getComputedStyle(progress1,'::after');
progress1.style.setProperty('--afterBack5',percentage5+'%');
// document.getElementById('stara').innerHTML ='hello';

    </script>
</body>

</html>
</body>

</html>
