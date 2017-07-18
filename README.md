

introduction:


This repo contains the scripts and code used to create a webpage that displays information on current flexget series data



this project was started because i am a classic lazy human and logging into ssh to execute 'flexget series list' was too much effort and
could only be run when ssh was available.



installation instructions:

step 1) configure your flexget as needed, an example exists as config.yml (note: for this code to work the command 'flexget series list' must return your content)

step 2) put showseries.sh somewhere, make sure it can be executed, note down its location (the steps from here forward will use /scripts/showseries.sh)

step 3) open your sudoers file and add in the line listed in the file 'sudoers line', substituting values where required (i.e the username and location)

step 4) put your index.php somewhere that it can be viewed as a webpage (i use /var/www/html/series/index.php, giving me http://mydomain.com/series/) 
change the line "exec('sudo -u USERNAMERUNNINGFLEXGET -H /scripts/showseries.sh', $out);" as needed (note: -H is required, it changes the home directory so that flexget series list works)



feel free to make an issue or patch for anything that is broken or can be improved.


software running during development:

Ubuntu 16.04.2 LTS

Apache/2.4.18

flexget 2.9.3

transmission 2.92
