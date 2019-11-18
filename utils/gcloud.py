from googleapiclient import discovery
from oauth2client.client import GoogleCredentials

def upload(csv):
    credentials = GoogleCredentials.get_application_default()
    service = discovery.build('storage', 'v1', credentials=credentials)

    filename = csv
    bucket = 'staging.library-258507.appspot.com'

    body = {'name': 'peoplecount.csv'}
    req = service.objects().insert(bucket=bucket, body=body, media_body=filename)
    resp = req.execute()
    print('done!')
