import imaplib
import email
mail = imaplib.IMAP4_SSL('imap.gmail.com')
# imaplib module implements connection based on IMAPv4 protocol
mail.login('lawdjesusrocks@gmail.com', 'qmesf40241')
# >> ('OK', [username at gmail.com Vineet authenticated (Success)'])
#print 'hello'

# selecting the mailbox
mail.list() # Lists all labels in GMail
mail.select('inbox') # Connected to inbox.
#print 'yolo'

result, data = mail.uid('search', None, "ALL")
print result, data

fo = open( "f1.txt" ,"w+")
print "file name", fo.name
# search and return uids instead
i = len(data[0].split()) # data[0] is a space separate string
for x in range(i):
	latest_email_uid = data[0].split()[x] # unique ids wrt label selected
	result, email_data = mail.uid('fetch', latest_email_uid, '(RFC822)')
 # fetch the email body (RFC822) for the given ID
 	raw_email = email_data[0][1];
	fo.write("test data incoming\n");
	fo.write(raw_email);

#continue inside the same for loop as above
raw_email_string = raw_email.decode('utf-8')
# converts byte literal to string removing b''
email_message = email.message_from_string(raw_email_string)
# this will loop through all the available multiparts in mail
for part in email_message.walk():
 if part.get_content_type() == "text/plain": # ignore attachments/html
  body = part.get_payload(decode=True)
  save_string = str("D:Dumpgmailemail_" + str(x) + ".eml")
  # location on disk
  myfile = open(save_string, 'a')
  myfile.write(body.decode('utf-8',errors='ignore'))
  # body is again a byte literal
  myfile.close()
 else:
  continue