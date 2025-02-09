// pages/index.tsx
import Link from 'next/link';

const Home = () => {
  return (
    <div>
      <h1>Bienvenue sur notre application</h1>
      <nav>
        <Link href="/map/page">Map</Link>
        <Link href="/species/page">Especes</Link>
      </nav>
    </div>
  );
};

export default Home;
