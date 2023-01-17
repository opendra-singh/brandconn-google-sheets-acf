# STEPS needs to follow to make plugin work

1) Installing plugin, (available in "acf-form-addon" folder).
2) Activate the plugin.
3) Import json in ACF for fields (available as 'acf-export-2023-01-16.json').
4) Now open a google sheet and add the script (available as Ansh Script Google Sheets Data Insert.txt) there.
5) Now change the google sheet url from line no.1 from script(point 4)
6) Change seet name line no2
7) Now, click dropdown option next to debug button
8) Select intialSetup
9) Then Click on Run Button, click on deploy after giving permission
10) Now, open custom .js from acf-form-addon plugin and add google sheet url there too.
11) Add shortcode on the page, where you want to display the things.

Hurray, It's all set now.

