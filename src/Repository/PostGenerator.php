<?php
declare(strict_types=1);

namespace App\Repository;

use App\Models\Post;

class PostGenerator implements IGenerator
{
    private $titles = [
        "Lorem ipsum dolor sit amet",
        "Mazim ludus nonumy ne est",
        "Mea ex populo imperdiet delicatissimi",
        "Eam ea ridens deserunt",
        "Atqui urbanitas eum id"
    ];
    private $bodies = [
        "Lorem ipsum dolor sit amet, ut eam porro utamur. Has no mucius facilis, vix exerci maiestatis in, simul accusata qui cu. Mutat assueverit his an, id eros vide dolore quo. Vis magna semper ex. Viderer signiferumque vix in, per ad choro electram.",
        "Ad feugiat oportere his, possit putant minimum at usu. Tale prima placerat eos ei. Et dicta lobortis sit, pro doming propriae assentior id, pri ut legere liberavisse. Vim ex cibo assum, ut meis vidit constituam cum, eum quem saperet accusata an. No sed duis congue evertitur. Ignota nostrud copiosae ex nam, pri an iudico copiosae hendrerit.",
        "Quo ei autem munere verear. Diam accumsan platonem vis ea, mel in mundi mentitum. Cu pro singulis cotidieque mediocritatem, quaeque tacimates in sit. Diceret bonorum vocibus sed eu, vivendo accusam contentiones his ei.",
        "Omnium interpretaris eos id, mel ea brute dolorem comprehensam. Ei essent sensibus reprehendunt est, cu esse decore has, omnis mutat causae his ex. Ne persius intellegebat deterruisset cum, per id duis efficiantur, in utinam perpetua qui. Id nam minimum voluptaria accommodare, blandit oportere elaboraret vix id. Possim facilis mentitum eam at, viris viderer constituam mei an. Fierent convenire urbanitas sed ea, duo at omnes similique.",
        "Cum ei esse epicurei detraxit, elit elitr aliquam mel eu. Legere invenire quo ut, id vocibus eleifend suavitate sea. Mazim offendit ex his. In mel reque exerci ocurreret. Et quas modus verterem pri, nibh voluptatum eam ad, zril oportere elaboraret usu te. Ea meis ullum nec."
    ];
    private $authors = [
        "Marilyn",
        "Jayson",
        "Rich",
        "Clementine",
        "Taren"
    ];

    public function GeneratePost(): Post
    {
        return new Post(
            $this->createTitle(),
            $this->createBody(),
            $this->createImageUrl(),
            $this->createAuthor(),
            $this->createAvatar()
        );
    }

    private function createTitle(): string
    {
        return $this->titles[rand(0, 4)];
    }

    private function createBody(): string
    {
        return $this->bodies[rand(0, 4)];
    }

    private function createAuthor(): string
    {
        return $this->authors[rand(0, 4)];
    }

    private function createImageUrl(): string
    {
        return "https://picsum.photos/700/300/?image=" . rand(1, 50);
    }

    private function createAvatar(): string
    {
        return "https://picsum.photos/10/10/?image=" . rand(51, 100);
    }

}