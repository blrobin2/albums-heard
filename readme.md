#Albums Heard

I've listened to a lot of albums in my life. I used to want to be a music critc back in college. Thing is, I rarely rated albums I listened to in that period, because either A: they were classics that I was afraid of not liking, or B: they were garbage and I wasn't willing to admit it.

But I've still heard a lot, and I've kept an excel sheet of each album heard. Recently, I decided to upload that data to a SQL database, and (through tutorials and tons of googling), built this little project. The code is not abstract enough for varied usecases, but can be referenced for ideas or methods.


A PHP, SQL, JavaScript/AJAX project.

##ChangeLog

2013-05-21: If JavaScript is enabled, you select a letter from a dropdown for the first letter of the band name. The result will be a list of artists and albums. Clicking an album will display my rating (out of 5 stars) if available. This feature is still being ajaxified. If JavaScript is not enabled, the PHP and SQL queries will kick in. No styles yet.