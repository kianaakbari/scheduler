<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use App\suspendedReservations;
use App\untaggedReservations;

class instaController extends Controller
{
    public function __construct()
    {
//        date_default_timezone_set("Iran");
    }

    public function userRecentMedia($access_token)
    {

//        $client = new Client();
//        $result = json_decode($client->get('https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token)->getBody());

        $testData = '{"pagination": {}, "data":[
        {"id":"1801624514845722619_7995394326","user":{"id":"7995394326","full_name":"api test","profile_picture":"https://instagram.frec1-2.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg","username":"_apitest_"},"images":{"thumbnail":{"width":150,"height":150,"url":"https://scontent.cdninstagram.com/vp/bd64337250b01b6bdf765a2742f6d673/5BA55F7E/t51.2885-15/s150x150/e35/34276078_636400773361793_2161008551554711552_n.jpg"},"low_resolution":{"width":320,"height":320,"url":"https://scontent.cdninstagram.com/vp/bcf89cd9b95da15093577b53719dee2c/5BBFDE39/t51.2885-15/s320x320/e35/34276078_636400773361793_2161008551554711552_n.jpg"},"standard_resolution":{"width":640,"height":640,"url":"https://scontent.cdninstagram.com/vp/0b5e5c4f37f1ebc67346d7b6ab919542/5BB3761B/t51.2885-15/e35/34276078_636400773361793_2161008551554711552_n.jpg"}},"created_time":"1528990400","caption":{"id":"17953047919020108","text":"Carousel","created_time":"1528990400","from":{"id":"7995394326","full_name":"api test","profile_picture":"https://instagram.frec1-2.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg","username":"_apitest_"}},"user_has_liked":false,"likes":{"count":0},"tags":[],"filter":"Normal","comments":{"count":0},"type":"carousel","link":"https://www.instagram.com/p/BkAp_NqA8f7skjwNGGaNwoSiYgNSa490WqwnLQ0/","location":null,"attribution":null,"users_in_photo":[{"user":{"username":"k.i.a.n.a.a.k"},"position":{"x":0.35740742000000003,"y":0.6527778}}],"carousel_media":[{"images":{"thumbnail":{"width":150,"height":150,"url":"https://scontent.cdninstagram.com/vp/bd64337250b01b6bdf765a2742f6d673/5BA55F7E/t51.2885-15/s150x150/e35/34276078_636400773361793_2161008551554711552_n.jpg"},"low_resolution":{"width":320,"height":320,"url":"https://scontent.cdninstagram.com/vp/bcf89cd9b95da15093577b53719dee2c/5BBFDE39/t51.2885-15/s320x320/e35/34276078_636400773361793_2161008551554711552_n.jpg"},"standard_resolution":{"width":640,"height":640,"url":"https://scontent.cdninstagram.com/vp/0b5e5c4f37f1ebc67346d7b6ab919542/5BB3761B/t51.2885-15/e35/34276078_636400773361793_2161008551554711552_n.jpg"}},"users_in_photo":[],"type":"image"},{"videos":{"standard_resolution":{"width":640,"height":640,"url":"https://scontent.cdninstagram.com/vp/62fddb93e176fc2eb0cf7070e36f15e6/5B248F25/t50.2886-16/34685868_1791560114239133_4080191161427539334_n.mp4","id":"17947014280074282"},"low_bandwidth":{"width":480,"height":480,"url":"https://scontent.cdninstagram.com/vp/f2d771831883b276b348afd423563234/5B2588F2/t50.2886-16/34707652_733452170378893_5029908530543148938_n.mp4","id":"17948218843068442"},"low_resolution":{"width":480,"height":480,"url":"https://scontent.cdninstagram.com/vp/f2d771831883b276b348afd423563234/5B2588F2/t50.2886-16/34707652_733452170378893_5029908530543148938_n.mp4","id":"17948218843068442"}},"users_in_photo":[],"type":"video"},{"images":{"thumbnail":{"width":150,"height":150,"url":"https://scontent.cdninstagram.com/vp/a954184053c44e20624d8f984beeb6d0/5BA3076F/t51.2885-15/s150x150/e35/34286409_239898226774199_4709461232388669440_n.jpg"},"low_resolution":{"width":320,"height":320,"url":"https://scontent.cdninstagram.com/vp/addf173ee837498e2e337f440def9001/5BC06B28/t51.2885-15/s320x320/e35/34286409_239898226774199_4709461232388669440_n.jpg"},"standard_resolution":{"width":640,"height":640,"url":"https://scontent.cdninstagram.com/vp/411022e7b345e409c81db4dfa34c9d0c/5BBBE76B/t51.2885-15/s640x640/sh0.08/e35/34286409_239898226774199_4709461232388669440_n.jpg"}},"users_in_photo":[{"user":{"username":"k.i.a.n.a.a.k"},"position":{"x":0.35740742000000003,"y":0.6527778}}],"type":"image"}]},
        {
            "id":"1800809483455258979_7995394326",
            "user":{
                "id":"7995394326",
                "full_name":"api test",
                "profile_picture":"https://instagram.flko3-1.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg",
                "username":"_apitest_"
            },
            "images":{
                "standard_resolution":{
                    "width":640,"height":640,
                    "url":"https://scontent.cdninstagram.com/vp/40a8c083f87927ec65a9d1443af0f54d/5BB02C50/t51.2885-15/s640x640/sh0.08/e35/33728676_218836565385757_350712727150264320_n.jpg"
                }
            },
            "created_time":"1528893240",
            "caption":{
                "id":"17926600120136038",
                "text":"Wed jun13, 5:03pm b iran, 12:32pm b utc\n@k.i.a.n.a.a.k a@h @k.i.a.n.a.a.k",
                "created_time":"1528893240",
                "from":{
                    "id":"7995394326",
                    "full_name":"api test",
                    "profile_picture":"https://instagram.flko3-1.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg",
                    "username":"_apitest_"
                }
            },
            "user_has_liked":false,
            "likes":{"count":0},
            "tags":[],
            "filter":"Clarendon",
            "comments":{"count":0},
            "type":"image",
            "link":"https://www.instagram.com/p/Bj9wq8hgWFjrVlVJZVfN4gyLrIa4kL1ArLCcuk0/",
            "location":{"latitude":35.7117,"longitude":51.407,"name":"Tehran Province","id":1024536754},
            "attribution":null,
            "users_in_photo":[]
        },
        {"id":"1800006929372802505_7995394326","user":{"id":"7995394326","full_name":"api test","profile_picture":"https://instagram.flko3-1.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg","username":"_apitest_"},"images":{"thumbnail":{"width":150,"height":150,"url":"https://scontent.cdninstagram.com/vp/e0946599fb12975ad00b204a4b9f5e22/5B9E4000/t51.2885-15/s150x150/e35/34689834_1965423927106182_1575785537686470656_n.jpg"},"low_resolution":{"width":320,"height":320,"url":"https://scontent.cdninstagram.com/vp/f7b98176b2d14e450c7bdd4d2f2210f1/5BB23030/t51.2885-15/s320x320/e35/34689834_1965423927106182_1575785537686470656_n.jpg"},"standard_resolution":{"width":640,"height":640,"url":"https://scontent.cdninstagram.com/vp/37005f002da2130e90ca89ff9751f104/5BA7D357/t51.2885-15/e35/34689834_1965423927106182_1575785537686470656_n.jpg"}},"created_time":"1528797568","caption":{"id":"17937802699100499","text":"My private picture","created_time":"1528797568","from":{"id":"7995394326","full_name":"api test","profile_picture":"https://instagram.flko3-1.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg","username":"_apitest_"}},"user_has_liked":false,"likes":{"count":0},"tags":[],"filter":"Normal","comments":{"count":0},"type":"image","link":"https://www.instagram.com/p/Bj66MPyge3JQHyqh51Le_Svv-9TDwbZefSGrjg0/","location":null,"attribution":null,"users_in_photo":[{"user":{"username":"hossein_khalili"},"position":{"x":0.15074357,"y":0.12389173}},{"user":{"username":"k.i.a.n.a.a.k"},"position":{"x":0.12592593,"y":0.6395835999999999}}]},{"id":"1799958062526872429_7995394326","user":{"id":"7995394326","full_name":"api test","profile_picture":"https://instagram.flko3-1.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg","username":"_apitest_"},"images":{"thumbnail":{"width":150,"height":150,"url":"https://scontent.cdninstagram.com/vp/068fe8d5e3bc9fb21c5dacf3d0ee921e/5BAC659E/t51.2885-15/s150x150/e35/33210229_220280838750336_1550157854378295296_n.jpg"},"low_resolution":{"width":320,"height":320,"url":"https://scontent.cdninstagram.com/vp/9ecb887e5ca21f25011734a00014f69f/5BA007D9/t51.2885-15/s320x320/e35/33210229_220280838750336_1550157854378295296_n.jpg"},"standard_resolution":{"width":640,"height":640,"url":"https://scontent.cdninstagram.com/vp/d71498761202efc8b6e91403e70b1cac/5BC2D99A/t51.2885-15/s640x640/sh0.08/e35/33210229_220280838750336_1550157854378295296_n.jpg"}},"created_time":"1528791743","caption":{"id":"17938220695097640","text":"Beautiful Doll \n#doll","created_time":"1528791743","from":{"id":"7995394326","full_name":"api test","profile_picture":"https://instagram.flko3-1.fna.fbcdn.net/vp/6bd6dcedfc8fa9ef41646b53d8811c0e/5BBBE67A/t51.2885-19/11906329_960233084022564_1448528159_a.jpg","username":"_apitest_"}},"user_has_liked":false,"likes":{"count":1},"tags":["doll"],"filter":"Normal","comments":{"count":3},"type":"image","link":"https://www.instagram.com/p/Bj6vFI_g7tts83_4EmrTvltEUlBsnsJdelYfag0/","location":{"latitude":35.802222222222,"longitude":51.393333333333,"name":"Shahid Beheshti University","id":213763931},"attribution":null,"users_in_photo":[{"user":{"username":"k.i.a.n.a.a.k"},"position":{"x":0.15416667,"y":0.22638889}}]}
        ],"meta": {"code": 200}}';

        $result = json_decode($testData);
        return $result;
    }

    public function myEvent()
    {
        $suspendedReservations = suspendedReservations::all();

        foreach ($suspendedReservations as $suspendedReservation){
            $access_token = $suspendedReservation -> influencer_instagram_token;
            $result = $this->userRecentMedia($access_token);

            if ($result->meta->code != 200) {
                //            notify me
                return;
            }

            // get the time of the reservation and compare it with current time
            // if the interval is more than 48 hour, requirements haven't been met
            // if the interval is more than 23 hour, search for finding a valid post

            $timeInterval = round((strtotime(date("Y-m-d H:i:s")) - strtotime($suspendedReservation->time))/3600, 1);

            if($timeInterval > 48){
                //notify admin that this user is culprit
                untaggedReservations::updateOrCreate([
                    'reservation_id' => $suspendedReservation->reservation_id
                ],[
                    'reservation_id' => $suspendedReservation->reservation_id
                    , 'isReviewed' => 0
                ]);
                $suspendedReservation->delete();
            }

            elseif ($timeInterval > 23){
                $media = $result->data;
                foreach ($media as $medium) {
                    $mediumTime = round(($medium->created_time - strtotime($suspendedReservation->time))/3600, 1);
                    $owner_username = $suspendedReservation->business_instagram_username;
                    if($mediumTime > 23){
//                      TODO check if influencer posted this post after reservation time
                        if ($this->isOwnerTagged($medium, $owner_username)) {
                            $suspendedReservation->delete();
                            break;
                        }
                    }
                }
            }
        }
    }


    public function isOwnerTagged($medium, $owner_username){
        $photoTaggedUsers = array();
        $users_in_photo = $medium->users_in_photo;
        foreach ($users_in_photo as $user_in_photo) {
            $photoTaggedUsers[] = $user_in_photo->user->username;
        }

        // Non repetitive users tagged in caption
        $captionTaggedUsers = array();
        $caption = $medium->caption->text;
        $captionWords = preg_split('/\s+/', $caption);
        foreach ($captionWords as $captionWord){
            if (preg_match('/^@(.)+/',$captionWord) && !in_array($captionWord, $captionTaggedUsers)){
                $captionTaggedUsers[] = $captionWord;
            }
        }

        //kaveh approach:

//        $type = $medium -> type;
//        switch ($type){
//            case("image"):
//                if(in_array($owner_username, $photoTaggedUsers) && in_array($owner_username, $captionTaggedUsers)) {
//                    return true;
//                }
//                return false;
//            case("video"):
//                if(in_array($owner_username, $captionTaggedUsers)) {
//                    return true;
//                }
//                return false;
//            case("carousel"):
//                $carouselHasImage = false;
//                $carousel_media = $medium -> carousel_media;
//                foreach ($carousel_media as $carousel_medium){
//                    if ($carousel_medium->type == "image"){
//                        $carouselHasImage = true;
//                    }
//                }
//
//                if($carouselHasImage){
//                    if(in_array($owner_username, $photoTaggedUsers) && in_array($owner_username, $captionTaggedUsers)) {
//                        return true;
//                    }
//                    return false;
//                }
//                else{
//                    if(in_array($owner_username, $captionTaggedUsers)) {
//                        return true;
//                    }
//                    return false;
//                }
//        }
//        return false;


        //niloofar approach:

        return (in_array($owner_username, $photoTaggedUsers) || in_array("@".$owner_username, $captionTaggedUsers));
    }

    public function test(){
        $this->myEvent();
//        $myfile = fopen("newfile.txt", "a");
//        $txt = "John Doe\n";
//        fwrite($myfile, $txt);
//        fclose($myfile);
    }
}
