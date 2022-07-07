<?php
/**
 * See video-store.php
 * The goal of this optional exercise is to design and implement a simple inventory
 * control system for a small video rental store.
 * Define least two classes: a class Video to model a video and
 * a class VideoStore to model the actual store.
 * Assume that a Video may have the following state:
 *      A title;
 *      a flag to say whether it is checked out or not; and
 *      an average user rating.
 * In addition, Video has the following behaviour:
 *      being checked out;
 *      being returned;
 *      receiving a rating.
 * The VideoStore may have the state of videos in there currently.
 * The VideoStore will have the following behaviour:
 *      add a new video (by title) to the inventory;
 *      check out a video (by title);
 *      return a video to the store;
 *      take a user's rating for a video;
 *      list the whole inventory of videos in the store.
 * Finally, create a VideoStoreTest which will test the functionality of your other two classes.
 * It should allow the following:
 *      Add 3 videos: "The Matrix", "Godfather II", "Star Wars Episode IV: A New Hope".
 *      Give several ratings to each video.
 *      Rent each video out once and return it.
 *      List the inventory after "Godfather II" has been rented out out.
 * Summary of design specs:
 *      Store a library of videos identified by title.
 *      Allow a video to indicate whether it is currently rented out.
 *      Allow users to rate a video and display the percentage of users that liked the video.
 *      Print the store's inventory, listing for each video:
 *              its title,
 *              the average rating,
 *              and whether it is checked out or on the shelves.
 */


class Application
{
    private VideoStore $store;

    public function __construct()
    {
        $this->store = new VideoStore();
    }

    function run()
    {
        while (true) {
            echo "Choose the operation you want to perform" . PHP_EOL;
            echo "Choose 0 for EXIT" . PHP_EOL;
            echo "Choose 1 to fill video store" . PHP_EOL;
            echo "Choose 2 to rent video (as user)" . PHP_EOL;
            echo "Choose 3 to return video (as user)" . PHP_EOL;
            echo "Choose 4 to list inventory" . PHP_EOL;

            $command = (int)readline();

            switch ($command) {
                case 0:
                    echo "Bye!" . PHP_EOL;
                    die;
                case 1:
                    $this->addVideo();
                    break;
                case 2:
                    $this->rentVideo();
                    break;
                case 3:
                    $this->returnVideo();
                    break;
                case 4:
                    $this->listInventory($this->store->getAvailableVideos());
                    break;
                default:
                    echo "Sorry, I don't understand you.." . PHP_EOL;
            }
        }
    }

    private function addVideo(): void
    {
        $movieTitle = readline('Enter movie title: ');

        $this->store->add(new Video($movieTitle));
    }

    private function rentVideo(): void
    {
        /** @var Video[] $inventory */
        $availableVideos = $this->store->getAvailableVideos();

        $this->listInventory($availableVideos);

        $selectedNumber = (int) readline('Enter movie number: ');

        $selectedVideo = $inventory[$selectedNumber];

        $this->store->rentVideo($selectedVideo);
    }

    private function returnVideo(): void
    {
        $this->listInventory($this->store->getRentedVideos());

        /** @var Video[] $inventory */
        $inventory = $this->store->getRentedVideos();

        if (empty($inventory)) return;

        $selectedNumber = (int) readline('Enter movie number: ');

        $selectedVideo = $inventory[$selectedNumber];

        $this->store->returnVideo($selectedVideo);

        $rating = (float) readline('Enter rating: ');

        $selectedVideo->receiveRating($rating);
    }

    private function listInventory(array $videos): void
    {
        foreach ($videos as $number => $video)
        {
            /** @var Video $video */
            echo "[{number}] - {$video->getTitle()} / {$video->averageRating()}" . PHP_EOL;
        }
    }
}

class VideoStore
{
    private array $availableVideos = [];
    private array $rentedVideos = [];

    public function add(Video $video): void
    {
        $this->availableVideos[] = $video;
    }

    public function rentVideo(Video $video): void
    {
        if (($key = array_search($video, $this->availableVideos)) !== false) {
            unset($this->availableVideos[$key]);
            $this->rentedVideos[] = $video;
        }
    }

    public function returnVideo(Video $video): void
    {
        if (($key = array_search($video, $this->rentedVideos)) !== false) {
            unset($this->rentedVideos[$key]);
            $this->availableVideos[] = $video;
        }
    }

    public function getAvailableVideos(): array
    {
        return $this->availableVideos;
    }

    public function getRentedVideos(): array
    {
        return $this->rentedVideos;
    }

}

class Video
{
    private string $title;
    private bool $inStore;
    private array $ratings = [];

    public function __construct(string $title,  bool $inStore = true)
    {
        $this->title = $title;
        $this->inStore = $inStore;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function checkedOut(): void
    {
        $this->inStore = false;
    }

    public function checkIn(): void
    {
        $this->inStore = true;
    }

    public function hasInStore(): bool
    {
        return $this->inStore;
    }

    public function receiveRating(float $rating)
    {
        $this->ratings[] = $rating;
    }

    public function averageRating(): float
    {
        if (count($this->ratings) === 0) return 0;

        return array_sum($this->ratings) / count($this->ratings);
    }
}

$app = new Application();
$app->run();
