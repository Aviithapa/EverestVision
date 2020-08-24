export default class Review {

  findBySlug(slug) {

    let reviews =
      {
        "nuwakot": {
          "reviews": [
            {
              "text": "What an amazing experience .This has to be my best travel experience in Nepal The family were so lovely and welcoming and made me feel most at home. They were so generous and kind. Uttam’s mother was the best cook and I was savored some wonderful Nepalese cooking and I also tried to help with the cooking. My room was comfortable and airy and I was in need of nothing with them continually asking if there was anything else I needed. My only regret was that I didn't have more time to spend with them. If you really want to know Nepal then this program of home stays is a must. I would thoroughly recommend staying with the home stay for real feel of Nepali life.  And also If you're uncertain about a homestay (I really wasn't sure what to its going to be) just go with an open mind and leave your Western expectations behind. You will be in for a treat.",
              "reviewer": "Eva Bond",
              "stars": "5",
              "date": "6 Sep 2017"
            },
            {
              "text": "Hi, it was an amazing experience. The host family are wonderful persons, immediately i felt like one of the family. The landscape is beautiful and the children of the school very nice. I was in one classrom talking to them and learning in both sides. So glad i found this project. I will upload a video of the lifestyle you may like to share it when finished, i will tell you. Thanks.",
              "reviewer": "Carlos De Las Heras",
              "stars": "5",
              "date": "29 Aug 2017"
            }
          ]
        },
        "panauti": {
          "reviews": [
            {
              "text": "The homestay was a real highlight of the whole trip. The village is beautiful and the welcome we got from the local families was amazing. We enjoyed being part of the family and the tour of the old village as well as the morning birdwatching. Our hosts were really welcoming. Particular thanks to Ashok our guide and his family. He was a brilliant guide and his family were so welcoming. I would fully recommend it!",
              "reviewer": "Bipin Bajracharya",
              "stars": "5",
              "date": "8 Mar 2017"
            },
            {
              "text": "A fantastic insight into local living : Panauti Community Homestay offers opportunities to stay in the houses of the residents of the town and improve your understanding of their customs and traditions. Ram and his family were extremely warm and welcoming and it was an honour to live with them in their home for the week. I was given my own bedroom with double bed and heated bed. The food served was delicious and authentically Nepali. The house was very traditional with quite steep stairs. The outside bathroom was modern with western style toilet and hot running water and shower. His two teenage daughters were charming and a pleasure to get to know.",
              "reviewer": "Jamez14",
              "stars": "5",
              "date": "December 2018"
            },
            {
              "text": "<p>Memorable and interesting experience : We stayed with our host family Serena, her husband and son for four days. They looked after us very well, fed us delicious food and made sure we were comfortable. The food they provided was very different to our usual fare and included Mo Mos, which were delicious, lentil crepes, tomato sauces, chick pea dishes, potato, chicken and buffalo meals. All were home made and we helped with some of the meal preparation, learning about the different herbs and spices used..</p> <p> Our hosts took us for a tour of the older part of the town including the temples and the museum, these were close to our home stay. Their way of life is different of course but by day two we felt at home which was great. We also had a farewell feast in which we dressed in saris and were served with food by our hosts and friends from the Community. There was dancing and lots of laughter - just brilliant! Yes do stay with local people, the experience is just so good.</p>",
              "reviewer": "Jacqueline J",
              "stars": "5",
              "date": "December 2018"
            }
          ]
        },
        "patlekhet": {
          "reviews": [
            {
              "text": "Had a wonderful stay with my hosts in Patlekhet. It exceeded my expectation. My host Rabindra is a wonderful guy and he explained me a-lot about his culture and village. Glad to be here. Would recommend it to everyone.",
              "reviewer": "Naomi Wright",
              "stars": "4",
              "date": "17 Mar 2017"
            },
            {
              "text": "True Nepali family life : Awesome experience!! we´ve been spending wonderful time with our \"nepali family\". They were very welcome with us and is a very interesting community work to know about All the members of the community get toghether to gives us welcome and invite to meet what they do for living in the super calm rural side of Nepal. Location is very close to Kathmandu and in touch with nature. To learn about sustainable and organic farming and make special memories and loving friends.",
              "reviewer": "vitosm2017",
              "stars": "5",
              "date": "June 2018"
            }
          ]
        },
        "barauli": {
          "reviews": [
            {
              "text": "Authentic Homestay : Stayed here for 2 nights whilst on a G Adventures trip from Delhi to Katmandu. This was certainly one of the highlights. Made to feel very welcome by the beautiful Tharu people of this village by a traditional dance. Sharing their food and generally feeling relaxed amongst this lifestyle that hasn’t changed for 100’s of years. Each hut is owned by a villager so the cost of staying their goes directly back to them so you do a little bit of good along the way. Highly recommended!!",
              "reviewer": "Olly P",
              "stars": "5",
              "date": "December 2018"
            },
            {
              "text": "<p>Namaste everyone! We stayed at the beautiful Barauli Homestay for 2 nights. We travelled from Kathmandu per bus and were most friendly welcomed by the women at the homestay. They built up an amazing village. The rooms made out of mud where a highlight itself to sleep in. The communal room was a great space to connect to and talk with the women and get an idea of their live. The community homestay arranged a first aid training for the women which a study friend from medical university and I were giving to them. They were so much interested in the topic and how to be independent and react in hazardous situations. The community also took us on a bike tour around the village and on an early morning safari in Chitwan.</p><p>Coming to food: it was delicious!!! it was a dream of nepalese food cooked by the women. Also not forget to mention the water. They offer filtered water in reusable glass jugs in order not to waste any plastics. It was honestly the best water I ever had on my travel throughout Nepal and definitely comparable with the european water.If you think about going there, GO THERE. it's an outstanding once in a lifetime experience you shouldn't miss.</p>",
              "reviewer": "Claudia H",
              "stars": "5",
              "date": "October 2018"
            },
            {
              "text": "Fantastic experience - great people, activities and food : The Barauli Community homestay was one of the highlights of our visit to Nepal. We were ceremoniously welcomed to the community and made to feel at home in the well maintained cottages. It was quite delightful. At night there were dances and music, and the meals were served in a cool community center. The activities an excursions were great for our group - bicycling thorough the area gave us a nice taste of village life in Nepal. The safari in Chitwan was great and the rhinos really cooperated and we saw them really close up and that was amazing.The villagers in the community were really gracious hosts and they engaged really well with our group and the students who traveled with us. I would highly recommend this experience!",
              "reviewer": "Eric N",
              "stars": "5",
              "date": "October 2018"
            }
          ]
        }
      }

    if (reviews[slug]) {
      return reviews[slug]
    }

    return {
      reviews: []
    }

  }
}
