<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantéPlus - Espace Patient</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .course-card {
            transition: transform 0.2s ease-in-out;
        }
        .course-card:hover {
            transform: translateY(-5px);
        }
        .gradient-bg {
            background: linear-gradient(135deg, #4F46E5 0%, #7C3AED 100%);
        }
        .sidebar {
            transition: transform 0.3s ease-in-out;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .sidebar.active {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
            }
        }
        .nav-link {
            transition: all 0.2s ease-in-out;
        }
        .nav-link:hover {
            background-color: rgba(79, 70, 229, 0.1);
        }
        .nav-link.active {
            background-color: #4F46E5;
            color: white;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Mobile Menu Button -->
    <button id="sidebarToggle" class="fixed top-4 left-4 z-50 md:hidden bg-white p-2 rounded-lg shadow-lg">
        <i class="fas fa-bars text-gray-600"></i>
    </button>

    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-64 bg-white shadow-lg fixed h-full z-40">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="gradient-bg p-2 rounded-lg">
                        <i class="fas fa-graduation-cap text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold text-gray-800">SantéPlus</span>
                </div>
                <nav class="space-y-2">
                    <a href="./mesCourses.php" class="nav-link flex items-center space-x-3 p-3 rounded-lg text-gray-600" data-section="courses">
                        <i class="fas fa-book"></i>
                        <span>Mes Réservations</span>
                    </a>
                    <a href="./explorer.php" class="nav-link flex items-center space-x-3 p-3 rounded-lg text-gray-600" data-section="explore">
                        <i class="fas fa-search"></i>
                        <span>Explorer</span>
                    </a>
                    <form action="" method="POST">
                        <button name="dec" class="nav-link flex items-center space-x-3 p-3 rounded-lg text-gray-600" aria-label="Déconnexion">
                            <i class="fas fa-sign-out-alt"></i>
                            <p class="mr-6">Déconnexion</p>
                        </button>
                    </form>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <main id="mainContent" class="flex-1 ml-0 md:ml-64 p-8 main-content">
            <!-- Les sections -->
            <div id="dashboard-section" class="section active">
                <!-- Header -->
                <header class="flex justify-between items-center mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Bonjour, Trouvez le soin adapté à votre besoin médical 👋</h1>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" 
                                   placeholder="Rechercher un cours..." 
                                   class="pl-10 pr-4 py-2 rounded-lg border border-gray-200 w-64 focus:ring-2 focus:ring-indigo-400 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <div class="flex items-center space-x-3">
                            <button class="p-2 rounded-lg text-gray-600 hover:bg-gray-100 relative">
                                <i class="fas fa-bell"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full w-4 h-4 flex items-center justify-center">3</span>
                            </button>
                            <img src="https://ui-avatars.com/api/?name=Alex+Doe&background=4F46E5&color=fff" 
                                 alt="Profil de Alex Doe" 
                                 class="w-10 h-10 rounded-lg cursor-pointer">
                        </div>
                    </div>
                </header>

                <div class="max-w-7xl mx-auto">
                    <h3 class="text-xl font-semibold mb-6 mt-16">Nos Services Médicaux</h3>
                    <div id="servicesList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <?php foreach ($results AS $result): ?>
                            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                                <div class="relative">
                                    <img src="<?= ROOT ?>/assets/images/medecin.jpg" alt="Photo de consultation médicale" class="w-full h-48 object-cover">
                                    <div class="absolute top-0 right-0 m-2">
                                        <span class="bg-purple-100 text-purple-800 px-2 py-1 rounded text-sm">Consultation</span>
                                    </div>
                                </div>
                                <div class="p-6">
                                    <h3 class="text-xl text-indigo-600 mb-2"><?= $result->nom .' '. $result->prenom; ?></h3>
                                    <p class="text-gray-600 mb-4"><?= $result->specialite; ?></p>
                                    <p class="text-gray-500 text-sm mb-4"><?= $result->biographie; ?></p>
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-bold text-indigo-600"><?= $result->adresse; ?></span>
                                            <button type="button" data-id="<?php echo $result->id; ?>" id="rendezVousButton" name="bookAppointment" class="btn-reserve px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                                                Rendez-vous
                                            </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- Bouton pour afficher le formulaire -->

    <section  id="rendezvous" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden">
        <!-- Formulaire caché au départ -->
        <div class="max-w-2xl mx-auto p-6 bg-white rounded-lg shadow-lg mt-8">

            <!-- class="   inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 -->
            <h2 class="text-3xl font-semibold text-center text-gray-800 mb-6">Ajouter un Rendez-Vous</h2>
            <form method="POST" class="space-y-4">
                
                <!-- ID Médecin -->
                <div class="hidden">
                    <label for="id_medecin" class="block text-lg font-medium text-gray-700">ID Médecin:</label>
                    <input type="number" id="id_medecin" name="id_medecin" value="" required
                        class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Date -->
                <div>
                    <label for="date" class="block text-lg font-medium text-gray-700">Date:</label>
                    <input type="date" id="date" name="date" required
                        class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-lg font-medium text-gray-700">Description:</label>
                    <textarea id="description" name="description" rows="4" cols="50" 
                        class="mt-2 p-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex gap-5 text-center">
                    <button type="submit" name="create_rendez_vous"
                        class="w-full py-3 px-6 mt-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        Créer le Rendez-Vous
                    </button>
                    <button type="button" id="cancel" class="w-full py-3 px-6 mt-4 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </section>

<script>
    


    const btnReserve = document.querySelectorAll('.btn-reserve');
    const formReserve = document.getElementById('rendezvous');
    const close = document.getElementById('cancel');
    let medecin = document.getElementById('id_medecin').value;

    close.addEventListener('click',function(){
        formReserve.classList.add('hidden');
    });

    btnReserve.forEach(btn => {
        btn.addEventListener('click', function(){
            formReserve.classList.remove('hidden');
            medecin = btn.dataset.id;
        });
    });





</script>
</body>
</html>