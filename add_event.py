from __future__ import print_function
import httplib2
import os

from apiclient import discovery
from oauth2client import client
from oauth2client import tools
from oauth2client.file import Storage

#import datetime

try:
	import argparse
	flags = argparse.ArgumentParser(parents=[tools.argparser]).parse_args()
except ImportError:
	flags = None

SCOPES = 'https://www.googleapis.com/auth/calendar', 'https://www.googleapis.com/auth/calendar.readonly', 'https://www.googleapis.com/auth/plus.login'
CLIENT_SECRET_FILE = 'client_secret.json'
APPLICATION_NAME = 'Add Events'


def get_credentials():
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
		else:
			credentials = tools.run(flow, store)
		print('Storing credentials to ' + credential_path)
	return credentials

def main():
	credentials = get_credentials()
	http = credentials.authorize(httplib2.Http())
	service = discovery.build('calendar', 'v3', http=http)
	f = open('mailid.txt', 'r')
	usermail = f.read().splitlines()
	print('Creating Events..')
	event = {}
	with open('event.txt') as g:
		for i, line in enumerate(g):
			if i == 0:
				event['summary']=line[:-1]
			if i == 1:
				event['location']=line[:-1]
			if i == 2:
				event['description']=line[:-1]
			if i == 3:
				event['start']=[{'dateTime': line[:-1]}]
			if i == 4:
				event['end']=[{'dateTime': line[:-1]}]
			if i > 5:
				break

	event['attendees']=[{
			'email': usermail
	}]
	event = service.events().insert(calendarId='primary', body=event).execute()
	print (('Event created: %s') % (event.get('htmlLink')))
	f.close()
if __name__ == '__main__':
	main()
