import imaplib
obj = imaplib.IMAP4_SSL('imap.gmail.com','993')
obj.login('lawdjesusrocks','qmesf40241')
obj.select('INBOX')
print obj.search(None,'UnSeen')
