import imaplib
mail = imaplib.IMAP4_SSL('imap.gmail.com','993')
mail.login('lawdjesusrocks', 'qmesf40241')
mail.list()
# Out: list of "folders" aka labels in gmail.
mail.select("inbox") # connect to inbox.