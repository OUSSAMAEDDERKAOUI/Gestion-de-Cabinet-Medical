
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Système de Rendez-vous Médicaux</title>
    <link href="/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body class="bg-gray-100">
    <div id="app" class="min-h-screen">
      <!-- Navigation -->
      <nav class="bg-white shadow-lg">
        <div class="max-w-6xl mx-auto px-4">
          <div class="flex justify-between items-center h-16">
            <div class="text-xl font-semibold text-blue-600">MediConnect</div>
            <div id="navLinks" class="hidden md:flex space-x-4">
              <button id="loginBtn" class="text-gray-600 hover:text-blue-600">Connexion</button>
              <button id="registerBtn" class="text-gray-600 hover:text-blue-600">Inscription</button>
            </div>
          </div>
        </div>
      </nav>

      <!-- Main Content -->
      <main class="max-w-6xl mx-auto mt-8 px-4">
        <!-- Auth Forms -->
        <div id="authForms" class="">
          <!-- Login Form -->
          <div id="loginForm" class="bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>
            <form class="space-y-4">
              <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" class="w-full mt-1 p-2 border rounded-md" required>
              </div>
              <div>
                <label class="block text-gray-700">Mot de passe</label>
                <input type="password" class="w-full mt-1 p-2 border rounded-md" required>
              </div>
              <div>
                <label class="block text-gray-700">Type de compte</label>
                <select class="w-full mt-1 p-2 border rounded-md">
                  <option value="patient">Patient</option>
                  <option value="doctor">Médecin</option>
                </select>
              </div>
              <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                Se connecter
              </button>
            </form>
          </div>

          <!-- Register Form -->
          <div id="registerForm" class=" bg-white p-8 rounded-lg shadow-md max-w-md mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Inscription</h2>
            <form class="space-y-4">
              <div>
                <label class="block text-gray-700">Nom</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" required>
              </div>
              <div>
                <label class="block text-gray-700">Prénom</label>
                <input type="text" class="w-full mt-1 p-2 border rounded-md" required>
              </div>
              <div>
                <label class="block text-gray-700">Email</label>
                <input type="email" class="w-full mt-1 p-2 border rounded-md" required>
              </div>
              <div>
                <label class="block text-gray-700">Mot de passe</label>
                <input type="password" class="w-full mt-1 p-2 border rounded-md" required>
              </div>
              <div>
                <label class="block text-gray-700">Type de compte</label>
                <select class="w-full mt-1 p-2 border rounded-md">
                  <option value="patient">Patient</option>
                  <option value="doctor">Médecin</option>
                </select>
              </div>
              <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                S'inscrire
              </button>
            </form>
          </div>
        </div>

        <!-- Dashboard -->
        <div id="dashboard" class="">
          <!-- Patient Dashboard -->
          <div id="patientDashboard" class="hidden">
            <h2 class="text-2xl font-bold mb-6">Tableau de bord Patient</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Prendre un rendez-vous</h3>
                <form id="appointmentForm" class="space-y-4">
                  <div>
                    <label class="block text-gray-700">Médecin</label>
                    <select class="w-full mt-1 p-2 border rounded-md" id="doctorSelect"></select>
                  </div>
                  <div>
                    <label class="block text-gray-700">Date</label>
                    <input type="date" class="w-full mt-1 p-2 border rounded-md">
                  </div>
                  <div>
                    <label class="block text-gray-700">Heure</label>
                    <input type="time" class="w-full mt-1 p-2 border rounded-md">
                  </div>
                  <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700">
                    Confirmer le rendez-vous
                  </button>
                </form>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Mes rendez-vous</h3>
                <div id="appointmentsList" class="space-y-4"></div>
              </div>
            </div>
          </div>

          <!-- Doctor Dashboard -->
          <div id="doctorDashboard" class="">
            <h2 class="text-2xl font-bold mb-6">Tableau de bord Médecin</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Rendez-vous à venir</h3>
                <div id="doctorAppointments" class="space-y-4"></div>
              </div>
              <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Statistiques</h3>
                <div id="doctorStats" class="space-y-4">
                  <div class="flex justify-between items-center">
                    <span>Patients totaux:</span>
                    <span class="font-bold" id="totalPatients">0</span>
                  </div>
                  <div class="flex justify-between items-center">
                    <span>Rendez-vous aujourd'hui:</span>
                    <span class="font-bold" id="todayAppointments">0</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
    <script type="module" src="/main.js"></script>
  </body>
</html>

