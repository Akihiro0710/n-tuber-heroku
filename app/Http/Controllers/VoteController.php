<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\Vtuber;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        $user_id = $this->getCurrentUserId($request);
        $votes = Vote::where('user_id', $user_id)->get()->toArray();
        $vtubers = Vtuber::all()->toArray();
        $answerVtuber = collect($vtubers)->random();

        $commentsList = [
            2 => [
                "うーん。見た目を信じすぎやねぇ",
                "もう少しがんばらんなねー",
                "中々すごいぜー？",
                "おしい!あと少しやん!",
                "あんた天才か!？"],
            1 => [
                "残念",
                "もう少しね",
                "まずまずな結果だー",
                "おおすごい",
                "天才が現れた…!",
            ],
            5 => [
                "本当に蛇の林檎を食したのか…？",
                "まだまだ知恵が足りぬようだな",
                "俺と並ぶに十万光年早いぞ未熟者",
                "気に入った。貴様、名は何という？",
                "まさか、この俺を超えただと…？"],
            4 => [
                "分かりづらかったですかね…ハードディスク",
                "まずまず、ですね…",
                "大分健闘されていますね",
                "す、すごい…",
                "最早神ですね!!!"
            ],
            3 => [
                "…あ？あスンマセンこたろーに夢中で見てませんでした",
                "ふ〜ん。ダメダメっすね",
                "まずまずなんじゃないっすか？",
                "おーすっげー",
                "神すげえ！！"
            ],
            6 => [
                "今の一句「まだだめだ　もすこし勉強　がんばって」",
                "今の一句「もう少し　歩くなメロス　走るんだ」",
                "今の一句「よくやった　腕を上げたな　我が息子」",
                "「ごん…　お前だったのか」",
                "「サウイウヒトニ　ワタシハナリタイ」"
            ],
            7 => [
                "だぁーめだねーー！失格！！！",
                "もぉ〜〜〜ちょいだぁーー！！！",
                "んんーーーーいい線いってるーーーカナ？",
                "おぉおお〜〜〜？！イケんじゃん？！",
                "やったじゃーん今夜は宴だ飲むぞーーー！！！",
            ],
            8 => [
                "ん？あ、すみません。爪ヤスリかけてて聞いてませんでした",
                "いいんじゃないです？（ネイル塗りながら）",
                "いいですね！",
                "すごい！",
                "えっっすっご、何なのネイルの神様？！！"
            ],
            9 => [
                "……………（瞑想中）",
                "……………ん？",
                "……………ふむ",
                "……………ほぅ、",
                "悟りの道を開いたようだな"
            ],
            10 => [
                "修行が足りませんね！",
                "まだまだですね！",
                "まずまずですね",
                "中々やるじゃないですか",
                "私と一緒に社会の闇を暴きましょう！"
            ]
        ];
        $success = 0;
        $fail = 0;
        foreach ($vtubers as $vtuber) {
            foreach ($votes as $vote) {
                if ($vtuber['id'] == $vote['vtuber_id']) {
                    if ($vtuber['gender'] == $vote['gender']) {
                        $success++;
                    } else {
                        $fail++;
                    }
                    break;
                }
            }
        }
        $total = $success + $fail;
        $rate = $success * 100 / $total;
        $comments = $commentsList[$answerVtuber['id']];
        if ($rate < 30) {
            $comment = $comments[4];
        } elseif ($rate < 5080) {
            $comment = $comments[3];
        } elseif ($rate < 80) {
            $comment = $comments[2];
        } elseif ($rate < 100) {
            $comment = $comments[1];
        } else {
            $comment = $comments[0];
        }
        $rate = intval($rate);
        $request->session()->pull('id');
        $image = $answerVtuber['thumbnail'];
        return view('votes.index', compact('success', 'fail', 'rate', 'image', 'comment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param $vtuber_id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $vtuber_id)
    {
        $user_id = $this->getCurrentUserId($request);
        $vote = Vote::where('vtuber_id', $vtuber_id)->where('user_id', $user_id)->first();
        $gender = $request->query->get('gender');
        if (is_null($vote)) {
            $vote = new Vote();
            $vote->create(compact('vtuber_id', 'user_id', 'gender'));
        } else {
            $vote->fill(compact('gender'));
            $vote->save();
        }
        $redirect_to = $request->query->get('redirect_to');
        return redirect()->to($redirect_to);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
