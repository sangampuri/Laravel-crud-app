@extends('layouts.main')
@push('title')
    <title>Home page</title>
@endpush
@section('main-section')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        .font-serif-display { font-family: 'DM Serif Display', serif; }
        .font-sans-body { font-family: 'Inter', sans-serif; }
        /* Animación suave para cambio de pestañas/opciones */
        .fade-in { animation: fadeIn 0.3s ease-in-out; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(5px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body class="bg-gray-50 font-sans-body">

<section class="py-20 px-4 md:px-8">
    <div class="max-w-5xl mx-auto">
        
        <div class="text-center mb-12">
            <span class="text-blue-600 font-bold tracking-wider uppercase text-sm">Tu apoyo cuenta</span>
            <h2 class="text-4xl md:text-5xl font-serif-display text-gray-900 mt-2 mb-4">Impulsa nuestra <span class="text-blue-900 italic">Misión</span></h2>
            <p class="text-gray-500 max-w-2xl mx-auto">Tu contribución nos ayuda a seguir brindando talleres de arte, seminarios educativos y recursos para nuestra comunidad.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <div class="lg:col-span-7 bg-white rounded-3xl shadow-xl p-8 md:p-10 border border-gray-100 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-2 bg-linear-to-r from-blue-900 to-blue-500"></div>
                
                <h3 class="text-2xl font-serif-display text-gray-800 mb-6">Selecciona un monto</h3>
                
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <button onclick="selectAmount(this, 10)" class="donation-btn py-4 rounded-xl border-2 border-gray-200 text-gray-600 font-bold text-xl hover:border-blue-600 hover:text-blue-600 transition-all focus:outline-none bg-white">
                        $10
                    </button>
                    <button onclick="selectAmount(this, 25)" class="donation-btn py-4 rounded-xl border-2 border-blue-900 bg-blue-900 text-white font-bold text-xl transition-all focus:outline-none shadow-lg transform scale-105 ring-2 ring-blue-300">
                        $25
                    </button>
                    <button onclick="selectAmount(this, 50)" class="donation-btn py-4 rounded-xl border-2 border-gray-200 text-gray-600 font-bold text-xl hover:border-blue-600 hover:text-blue-600 transition-all focus:outline-none bg-white">
                        $50
                    </button>
                </div>

                <div class="mb-8">
                    <label class="block text-sm font-semibold text-gray-500 mb-2">O ingresa tu propio monto</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <span class="text-gray-400 text-lg font-bold group-focus-within:text-blue-600">$</span>
                        </div>
                        <input type="number" id="custom-amount" placeholder="0.00" onfocus="clearButtons()"
                            class="w-full pl-10 pr-4 py-4 rounded-xl bg-gray-50 border-2 border-gray-200 text-gray-800 font-bold text-lg focus:outline-none focus:border-blue-600 focus:bg-white focus:ring-4 focus:ring-blue-600/10 transition-all">
                    </div>
                </div>

                <button class="w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2 text-lg">
                    <span>Proceder con la Donación</span>
                    <ion-icon name="heart" class="text-red-400"></ion-icon>
                </button>
                
                <p class="text-xs text-center text-gray-400 mt-4 flex items-center justify-center gap-1">
                    <ion-icon name="lock-closed-outline"></ion-icon> Transacción segura encriptada
                </p>
            </div>

            <div class="lg:col-span-5 space-y-6">
                
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 relative group">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 bg-blue-50 rounded-full flex items-center justify-center text-blue-900">
                            <ion-icon name="business-outline" class="text-xl"></ion-icon>
                        </div>
                        <h4 class="font-bold text-gray-800">Transferencia Bancaria</h4>
                    </div>
                    
                    <div class="bg-gray-50 rounded-xl p-4 border border-gray-200 space-y-3">
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-bold">Banco</p>
                            <p class="text-gray-800 font-medium">Banco Sinnombre por defecto</p>
                        </div>
                        <div class="relative">
                            <p class="text-xs text-gray-500 uppercase font-bold">No. de Cuenta</p>
                            <div class="flex items-center justify-between">
                                <p class="text-gray-800 font-mono text-lg font-bold tracking-wide" id="bank-account">123-456789-0</p>
                                <button onclick="copyToClipboard('bank-account')" class="text-blue-600 hover:text-blue-800 text-sm font-semibold flex items-center gap-1 bg-white px-2 py-1 rounded shadow-sm hover:shadow">
                                    <ion-icon name="copy-outline"></ion-icon> Copiar
                                </button>
                            </div>
                        </div>
                        <div>
                            <p class="text-xs text-gray-500 uppercase font-bold">Nombre</p>
                            <p class="text-gray-800 font-medium">Fundación sinnombre</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#0F172A] rounded-2xl shadow-lg p-6 text-white relative overflow-hidden group">
                    <ion-icon name="logo-bitcoin" class="absolute -right-4 -bottom-4 text-9xl text-white opacity-5 rotate-12"></ion-icon>
                    
                    <div class="flex items-center gap-3 mb-4 relative z-10">
                        <div class="w-10 h-10 bg-orange-500 rounded-full flex items-center justify-center text-white">
                            <ion-icon name="logo-bitcoin" class="text-xl"></ion-icon>
                        </div>
                        <h4 class="font-bold">Donar con Bitcoin</h4>
                    </div>

                    <div class="flex gap-4 relative z-10">
                        <div class="w-24 h-24 bg-white rounded-lg p-1 shrink-0">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa" alt="BTC QR" class="w-full h-full object-contain">
                        </div>
                        
                        <div class="flex flex-col justify-center w-full overflow-hidden">
                            <p class="text-xs text-gray-400 uppercase font-bold mb-1">Wallet Address</p>
                            <div class="bg-white/10 rounded-lg p-2 flex items-center justify-between border border-white/20">
                                <p class="text-xs font-mono text-gray-200 truncate mr-2" id="btc-wallet">1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa</p>
                                <button onclick="copyToClipboard('btc-wallet')" class="text-orange-400 hover:text-orange-300 hover:bg-white/10 rounded p-1 transition-colors">
                                    <ion-icon name="copy-outline"></ion-icon>
                                </button>
                            </div>
                            <p class="text-[10px] text-gray-400 mt-2 italic">*Solo red Bitcoin (BTC)</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        // Lógica para selección de botones
        function selectAmount(btn, amount) {
            // Resetear todos los botones
            document.querySelectorAll('.donation-btn').forEach(b => {
                b.classList.remove('bg-blue-900', 'text-white', 'border-blue-900', 'shadow-lg', 'scale-105', 'ring-2', 'ring-blue-300');
                b.classList.add('bg-white', 'text-gray-600', 'border-gray-200');
            });
            // Activar botón seleccionado
            btn.classList.remove('bg-white', 'text-gray-600', 'border-gray-200');
            btn.classList.add('bg-blue-900', 'text-white', 'border-blue-900', 'shadow-lg', 'scale-105', 'ring-2', 'ring-blue-300');
            
            // Limpiar input manual
            document.getElementById('custom-amount').value = '';
        }

        // Limpiar botones al escribir manual
        function clearButtons() {
            document.querySelectorAll('.donation-btn').forEach(b => {
                b.classList.remove('bg-blue-900', 'text-white', 'border-blue-900', 'shadow-lg', 'scale-105', 'ring-2', 'ring-blue-300');
                b.classList.add('bg-white', 'text-gray-600', 'border-gray-200');
            });
        }

        // Lógica de Copiar al Portapapeles
        function copyToClipboard(elementId) {
            const text = document.getElementById(elementId).innerText;
            navigator.clipboard.writeText(text).then(() => {
                alert('¡Copiado al portapapeles!');
            });
        }
    </script>
</section>

</body>
</html>
@endsection