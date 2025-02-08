import { MapContainer, TileLayer} from 'react-leaflet';


const MapComponent = () => {
  const position: [number, number] = [51.505, -0.09]; 
  
  return (
    <MapContainer center={position} zoom={13} style={{ width: '100%', height: '500px' }}>
      <TileLayer
        url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
        attribution='&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
      />
     
    </MapContainer>
  );
};

export default MapComponent;
