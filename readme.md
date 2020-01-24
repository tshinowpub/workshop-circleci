[![<CircleCI>](https://circleci.com/gh/tshinowpub/workshop-circleci.svg?style=svg)](https://circleci.com/gh/tshinowpub/workshop-circleci)

# CircleCI Workshop

CircleCI Workshop はCIを利用したことがない人向けに、実際にどのように使うかの例として作成したサンプルコードです。
実際にCIを利用してGithubにプッシュを行った際に、

サンプルコードは PHP7.4.x で作成されています。

実際のコードはテストをしながらコードを改善していくという観点から、[新装版 リファクタリング―既存のコードを安全に改善する― (OBJECT TECHNOLOGY SERIES) ][新装版 リファクタリング]の第1章で紹介されているビデオレンタルのコードを一部変更しながらPHPで書き直しています。

Gitの運用フローは、[GitFlow][GitFlow]やそれに近しいフローを想定しています。

## ターゲット
CIを使ったことがない人・使い始めの人

## 必要な知識
- Dockerで開発環境を作成できる程度の知識
- PHP7.xで動くコードを書けるレベルの知識

## その他
- デプロイ部分は環境に依存するためあえて、何も記載していません。

## 引用
- [新装版 リファクタリング―既存のコードを安全に改善する― (OBJECT TECHNOLOGY SERIES) ][新装版 リファクタリング]

[新装版 リファクタリング]: https://www.amazon.co.jp/%E3%83%AA%E3%83%95%E3%82%A1%E3%82%AF%E3%82%BF%E3%83%AA%E3%83%B3%E3%82%B0%E2%80%95%E6%97%A2%E5%AD%98%E3%81%AE%E3%82%B3%E3%83%BC%E3%83%89%E3%82%92%E5%AE%89%E5%85%A8%E3%81%AB%E6%94%B9%E5%96%84%E3%81%99%E3%82%8B%E2%80%95-OBJECT-TECHNOLOGY-Martin-Fowler/dp/427405019X/ref=tmm_pap_swatch_0?_encoding=UTF8&qid=&sr=
[PHPStanで始める継続的静的解析 #phperkaigi /php-static-analysis]: https://speakerdeck.com/hirak/php-static-analysis
[GitFlow]: https://nvie.com/posts/a-successful-git-branching-model/
[Github Flow]: http://scottchacon.com/2011/08/31/github-flow.html


