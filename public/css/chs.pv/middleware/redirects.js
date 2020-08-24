export default function (req, res, next) {


  const redirectUrls = [
    "s/_all",
    "/blog/",
    "/blog",
    "/about-us",
    "/blog/about/",
    "/47962/chitwan",
    "/47964/nuwakot",
    "/users/login",
    "/blog/page/2/",
    "/47962/chitwan/page",
    "/user/detail/7610",
    "/user/detail/7606",
    "/trust-and-safety",
    "/user/detail/7609",
    "/user/detail/7608",
    "/user/detail/7588",
    "/user/detail/7584",
    "/user/detail/7589",
    "/user/detail/7607",
    "/user/detail/7707",
    "/user/detail/7668",
    "/blog/fun/",
    "/travelers-tales",
    "/blog/news/",
    "/why-host",
    "/blog/stories/",
    "/chn-profile",
    "/contact-us",
    "/helpful-tips",
    "/users/signup",
    "/invite-friends",
    "/course-host",
    "/users/resetpassword",
    "/chitwan/1542/barauli-community-homestay",
    "/annapurna/1549/annapurna-community-trek",
    "/palpa/1546/palpa-community-homestay",
    "/chitwan/1543/tharu-community-homestay",
    "/nuwakot/1545/nuwakot-community-homestay",
    "/bardia/1555/bardia-community-homestay",
    "/patan/1550/patan-community-homestay",
    "/panauti/1541/panauti-community-homestay",
    "/rasuwa/1551/tamang-heritage-trail",
    "/illam/1553/ilam-community-homestay",
    "/patlekhet/1548/patlekhet-community-homestay",
    "/nagarkot/1547/nagarkot-community-homestay",
    "/blog/category/nepal/",
    "/terms-of-service",
    "/blog/category/accommodation/",
    "/backstreet-in-press",
    "/blog/category/photo/",
    "/blog/tag/nepal/",
    "/annapurna/1564/mustang-bon-community-homestay",
    "/panauti/1560/community-hike-sanga-panauti",
    "/blog/banner-text/",
    "/how-it-works",
    "/blog/tag/palpa/",
    "/blog/category/fun/",
    "/blog/tag/rhino/",
    "/blog/tag/hiking/",
    "/blog/tag/tansen/",
    "/bhada-village/1577/bhada-community-homestay",
    "/blog/tag/tharu/",
    "/blog/category/food/",
    "/blog/tag/communityhomestay/",
    "/blog/tag/nagarkot/",
    "/blog/tag/patan/",
    "/user/detail/7585",
    "/user/detail/7720",
    "/course_manager/courses/calculate_total",
    "/blog/paklekhet-community-homestay-village-milk-honey/",
    "/blog/nuwakot-community-homestay/",
    "/blog/category/ch-stories/",
    "/blog/chasing-waterfalls-nagarkot/",
    "/blog/nagarkot-community-homestay/",
    "/blog/category/responsible-travel/",
    "/positive-impact-on-communities",
    "/blog/travel-talk-2/",
    "/blog/tag/community-hike/",
    "/blog/tag/local-hospitality/",
    "/blog/tag/bengal-tiger/",
    "/blog/tag/live-local/",
    "/blog/tag/nuwakot-palace/",
    "/blog/category/travel-tips/",
    "/blog/tag/newari-food/",
    "/blog/tag/tharu-village/",
    "/blog/category/offbeat-travel/",
    "/course_manager/bookings/confirm_booking_request/1546",
    "/blog/tag/rani-mahal/",
    "/course_manager/users/do_login/Instant_Booking",
    "/blog/community-hike-sanga-panauti/",
    "/blog/category/places-to-visit/",
    "/blog/tag/nagarkot-community-homestay/",
    "/blog/tag/bardia-community-homestay/",
    "/blog/tag/bardia-national-park/",
    "/blog/tag/patan-community-homestay/",
    "/blog/tag/nuwakot-community-homestay/",
    "/blog/tag/palpa-community-homestay/",
    "/blog/tag/barauli-community-homestay/",
    "/blog/tag/bardiya-national-park/",
    "/blog/tag/panauti-community-hike/",
    "/bookings/confirm-contact-host/1578",
    "/blog/diversity-nepal-journey-kathmandu-palpa/",
    "/blog/10-good-reasons-go-bardia/",
    "/blog/10-tips-staying-home-stays/",
    "/blog/freelancer-guides-visit-community-homestays/",
    "/blog/category/ch-stories/page/2/",
    "/blog/tag/live-local-in-nepal/",
    "/course_manager/courses/course_review/1545/page%3A",
    "/course_manager/courses/course_review/1541/page%3A",
    "/course_manager/courses/course_review/1548/page%3A",
    "/blog/bardia-rustic-living-dallas-tharu-community/",
    "/course_manager/courses/course_review/1577/page%3A",
    "/blog/untold-story-of-patan-community-homestay/",
    "/course_manager/courses/course_review/1560/page%3A",
    "/blog/10-good-reasons-visit-tansen-nepal/",
    "/course_manager/courses/course_review/1542/page%3A",
    "/blog/top-10-reasons-visit-bardiya-community-homestay/",
    "/blog/meet-true-colors-life-patlekhet-community-homestay/",
    "/blog/barauli-community-home-stay-tharu-village-chitwan/",
    "/blog/illam-community-homestay-authentic-beauty-tea-pot/",
    "/blog/nagarkot-community-homestay-excuse-means-just-getting-way/",
    "/blog/patan-community-homestay-food-culture-arts-authentic-people/",
    "/blog/rana-ujeshwori-bhagwoti-temple-bhagwoti-jatra-victory-granting-goddess-palpa/",
    "/course_manager/courses/course_review/1541/Need%20to%20talk%20to%20us?%20Click%20for%20our%20local%20customer%20support.",
    "/course_manager/courses/course_review/1548/Need%20to%20talk%20to%20us?%20Click%20for%20our%20local%20customer%20support.",
  ];

  if (redirectUrls.includes(req.path)) {
    res.redirect(301,'/')
    return
  }

  next()

}
