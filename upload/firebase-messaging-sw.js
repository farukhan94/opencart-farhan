importScripts('https://www.gstatic.com/firebasejs/9.22.1/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.22.1/firebase-messaging-compat.js');

try {
  // The service worker can receive config via query params for dynamic usage
  const urlParams = new URL(location).searchParams;
  const configStr = urlParams.get('config');

  if (configStr) {
    firebase.initializeApp(JSON.parse(decodeURIComponent(configStr)));
  } else {
    // Initialize Firebase with your config if you want background Push Notification handling.
    // Replace the empty object below with your actual firebaseConfig.
    firebase.initializeApp({
      // apiKey: "...", projectId: "...", ...
    });
  }

  const messaging = firebase.messaging();
  const channel = new BroadcastChannel('fcm_test_channel');

  messaging.onBackgroundMessage((payload) => {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);

    // Send to UI for testing app
    channel.postMessage(payload);

    const notificationTitle = payload.notification?.title || 'New Notification';
    const notificationOptions = {
      body: payload.notification?.body || '',
    };
    self.registration.showNotification(notificationTitle, notificationOptions);
  });
} catch (e) {
  console.warn("Firebase SW Init Warning (Foreground token generation will still work if foreground app is configured):", e.message);
}
