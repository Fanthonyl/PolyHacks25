import 'leaflet/dist/leaflet.css';
import dynamic from 'next/dynamic';

const MapComponent = dynamic(() => import('../../components/MapComponent'), {
  ssr: false, 
});

export default function Page() {
  return (
    <section>
      <div className="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
        <div className="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8">
          {/* Colonne gauche (texte) */}
          <div className="md:col-span-1">
            <div className="max-w-lg md:max-w-none">
              <h2 className="text-2xl font-semibold text-gray-900 sm:text-3xl">
                Carte géolocalisation sous-marine
              </h2>

              <p className="mt-4 text-gray-700">
                La magnifique carte de BlueWatch
              </p>
            </div>
          </div>

          {/* Colonne droite (image) */}
          <div className="md:col-span-1">
          <MapComponent />
          </div>
        </div>
      </div>
    </section>
  )
}


