# CS252_proj: Event Calendar
CS252 project repository
Group 51
Contributors: Shashaank Kaim | Kunal Chaturvedi | Sachin K Salim

What the project is about: We provide a platform for the IITK students to see all the events that is happening and will happen, and add the events they're interested to attend to their google calendar on the click of a button.

How we do it: We extract the mails from the IITK webmail(actually we forward it to gmail and then access from it) and parse those mails that have events listed them in a specified format(which is given in README of mail_data folder) and upload it to our website whenever someone logs in. When a user clicks "Add to Calendar" right next to an event, that event is added to their google calendar.

NOTE: The users have to turn on "Allow less secure apps to access" in https://www.google.com/settings/security/lesssecureapps for us to add to their calendar.
