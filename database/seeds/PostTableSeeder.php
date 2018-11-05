
<?php

use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('posts')->delete();


        $first_post = new Post();
        $first_post->user_id = 1;
        $first_post->title = "Knossos - Bronze Age archaeological site";
        $first_post->text = "Knossos (also Cnossos, both pronounced /(kə)ˈnɒsɒs, -səs/; Greek: Κνωσός, Knōsós [knoˈsos]) is the largest Bronze Age archaeological site on Crete and has been called Europe's oldest city.

Settled as early as the Neolithic period, the name Knossos survives from ancient Greek references to the major city of Crete. The palace of Knossos eventually became the ceremonial and political centre of the Minoan civilization and culture. The palace was abandoned at some unknown time at the end of the Late Bronze Age, c. 1380–1100 BC. The reason why is unknown, but one of the many disasters that befell the palace is generally put forward.

In the first palace period around 2000 BC the urban area reached a size of up to 18,000 people. In its peak the palace and surrounding city boasted a population of 100,000 people shortly after 1700 BC.";
        $first_post->image = 'knossos.jpg';
        $first_post->save();

        $second_post = new Post();
        $second_post->user_id = 2;
        $second_post->title = "Alexandria - second-largest city in Egypt";
        $second_post->text = "Alexandria (/ˌælɪɡˈzændriə/ or /-ˈzɑːnd-/; Egyptian Arabic: إسكندريه‎ Eskendereyya; Arabic: الإسكندرية‎ al-ʾIskandariyya; Coptic: ⲁⲗⲉⲝⲁⲛⲇⲣⲓⲁ Alexandria or ⲣⲁⲕⲟϯ Rakote) is the second-largest city in Egypt and a major economic centre, extending about 32 km (20 mi) along the coast of the Mediterranean Sea in the north central part of the country. Its low elevation on the Nile delta makes it highly vulnerable to rising sea levels. Alexandria is an important industrial center because of its natural gas and oil pipelines from Suez. Alexandria is also a popular tourist destination.

Alexandria was founded around a small, ancient Egyptian town c. 332 BC by Alexander the Great. It became an important center of Hellenistic civilization and remained the capital of Ptolemaic Egypt and Roman and Byzantine Egypt for almost 1,000 years, until the Muslim conquest of Egypt in AD 641, when a new capital was founded at Fustat (later absorbed into Cairo). Hellenistic Alexandria was best known for the Lighthouse of Alexandria (Pharos), one of the Seven Wonders of the Ancient World; its Great Library (the largest in the ancient world; now replaced by a modern one); and the Necropolis, one of the Seven Wonders of the Middle Ages. Alexandria was at one time the second most powerful city of the ancient Mediterranean region, after Rome. Ongoing maritime archaeology in the harbor of Alexandria, which began in 1994, is revealing details of Alexandria both before the arrival of Alexander, when a city named Rhacotis existed there, and during the Ptolemaic dynasty.

From the late 18th century, Alexandria became a major center of the international shipping industry and one of the most important trading centers in the world, both because it profited from the easy overland connection between the Mediterranean Sea and the Red Sea, and the lucrative trade in Egyptian cotton.";
        $second_post->image = 'aleksandria.jpg';
        $second_post->save();

        $third_post = new Post();
        $third_post->user_id = 3;
        $third_post->title = "Machu Picchu";
        $third_post->text = "Machu Picchu (/ˈmɑːtʃuː ˈpiːktʃuː/ or /ˈpiːtʃuː/; Spanish: [ˈmatʃu ˈpi(k)tʃu]; Quechua: Machu Pikchu [ˈmɑtʃu ˈpiktʃu]) is a 15th-century Inca citadel, located in the Eastern Cordillera of southern Peru, on a mountain ridge 2,430 metres (7,970 ft) above sea level. It is located in the Cusco Region, Urubamba Province, Machupicchu District in Peru, above the Sacred Valley, which is 80 kilometres (50 mi) northwest of Cuzco and through which the Urubamba River flows, which cuts through the Cordillera and originates a canyon with tropical mountain climate.

Most archaeologists believe that Machu Picchu was constructed as an estate for the Inca emperor Pachacuti (1438–1472). Often mistakenly referred to as the \"Lost City of the Incas\" (a title more accurately applied to Vilcabamba), it is the most familiar icon of Inca civilization. The Incas built the estate around 1450 but abandoned it a century later at the time of the Spanish Conquest. Although known locally, it was not known to the Spanish during the colonial period and remained unknown to the outside world until American historian Hiram Bingham brought it to international attention in 1911.

Machu Picchu was built in the classical Inca style, with polished dry-stone walls. Its three primary structures are the Intihuatana, the Temple of the Sun, and the Room of the Three Windows. Most of the outlying buildings have been reconstructed in order to give tourists a better idea of how they originally appeared. By 1976, thirty percent of Machu Picchu had been restored and restoration continues.

Machu Picchu was declared a Peruvian Historic Sanctuary in 1981 and a UNESCO World Heritage Site in 1983. In 2007, Machu Picchu was voted one of the New Seven Wonders of the World in a worldwide Internet poll.";
        $third_post->image = 'machu_picchu.jpg';
        $third_post->save();
    }
}
