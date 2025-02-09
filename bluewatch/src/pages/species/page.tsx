import { useEffect, useState } from 'react';

interface Species {
  id: number;
  name: string;
  scientific_name: string;
  photo: string | null;
  descrip: string | null;
  size: number | null;
  weight: number | null;
  color: string | null;
  latitude: number | null;
  longitude: number | null;
  date_observation: string | null;
}

const Product = () => {
  const [species, setSpecies] = useState<Species[]>([]);
  const [loading, setLoading] = useState<boolean>(true);

  useEffect(() => {
    const fetchSpecies = async () => {
      try {
        const response = await fetch('/../../api/species'); // Appel à l'API Next.js
        const data = await response.json();
        setSpecies(data);
      } catch (error) {
        console.error('Erreur lors de la récupération des données:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchSpecies();
  }, []); // Le tableau vide [] signifie que cet effet sera exécuté une seule fois lors du montage du composant

  if (loading) return <div>Loading...</div>;

  return (
    <div>
      <h1>Liste des Espèces Aquatiques</h1>
      <ul>
        {species.map((speciesItem) => (
          <li key={speciesItem.id}>
            <h2>{speciesItem.name} ({speciesItem.scientific_name})</h2>
         
            <p>{speciesItem.descrip}</p>
            <p>Size: {speciesItem.size} cm</p>
            <p>Weight: {speciesItem.weight} kg</p>
            <p>Color: {speciesItem.color}</p>
            <p>Location: {speciesItem.latitude}, {speciesItem.longitude}</p>
            <p>Observed on: {speciesItem.date_observation}</p>
          </li>
        ))}
      </ul>
    </div>
  );
};

export default Product;
