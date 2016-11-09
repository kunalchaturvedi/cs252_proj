
from __future__ import print_function
import httplib2
import os

from apiclient import discovery
from oauth2client import client
from oauth2client import tools
from oauth2client.file import Storage

import datetime

try:
	import argparse
	flags = argparse.ArgumentParser(parents=[tools.argparser]).parse_args()
except ImportError:
	flags = None

# If modifying these scopes, delete your previously saved credentials
# at ~/.credentials/calendar-python-quickstart.json
SCOPES = 'https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/calendar.readonly', 'https://www.googleapis.com/auth/plus.login'
CLIENT_SECRET_FILE = 'client_secret2.json'
APPLICATION_NAME = 'Add Events'


def get_credentials():
	"""Gets valid user credentials from storage.

	If nothing has been stored, or if the stored credentials are invalid,
	the OAuth2 flow is completed to obtain the new credentials.

	Returns:
		Credentials, the obtained credential.
	"""
	home_dir = os.path.expanduser('~')
	credential_dir = os.path.join(home_dir, '.credentials')
	if not os.path.exists(credential_dir):
		os.makedirs(credential_dir)
	credential_path = os.path.join(credential_dir,
								   'calendar-python-quickstart.json')

	store = Storage(credential_path)
	credentials = store.get()
	if not credentials or credentials.invalid:
		flow = client.flow_from_clientsecrets(CLIENT_SECRET_FILE, SCOPES)
		flow.user_agent = APPLICATION_NAME
		if flags:
			credentials = tools.run_flow(flow, store, flags)
		else: # Needed only for compatibility with Python 2.6
			credentials = tools.run(flow, store)
		print('Storing credentials to ' + credential_path)
	return credentials

def main():
	"""Shows basic usage of the Google Calendar API.
	"""
	credentials = get_credentials()
	http = credentials.authorize(httplib2.Http())
	service = discovery.build('calendar', 'v3', http=http)

	print('Creating Events..')
	event = {
		'summary': 'CS252 Project Demo',
		'location': 'RM101,IIT Kanpur',
		'description': '50% weightage',
		'start': {
			'dateTime': '2016-11-08T11:00:00+05:30',
		},
		'end': {
			'dateTime': '2016-11-08T13:00:00+05:30',
		},
		#'attendees': [
		#	{'email': 'lawdjesusrocks@gmail.com'},
		#],
		#'id':'10002'
	}
	event = service.events().insert(calendarId='primary', body=event).execute()
	print (('Event created: %s') % (event.get('htmlLink')))
	#service.events().delete(calendarId='primary', eventId='10002').execute()
	#print (('%s') % (event.get(calendarId='primary', eventId='12345').execute()))

if __name__ == '__main__':
	main()


