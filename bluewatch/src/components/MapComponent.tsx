import { LatLngTuple } from 'leaflet';
import { MapContainer, TileLayer, Circle} from 'react-leaflet';


const MapComponent = () => {
  const position: [number, number] = [22.5, -89.5]; 
  const circlePosition: LatLngTuple = [24.5, -92.5];

  return (
    <MapContainer center={position} zoom={5}  minZoom={2} style={{ width: '100%', height: '500px' }}>
      <TileLayer
         url="https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}"
         attribution='&copy; <a href="https://www.esri.com/">Esri</a>, &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
       />
       <Circle
    center={circlePosition}
    color="red" 
    fillColor="#f03" 
    fillOpacity={0.5} 
    radius={400000} 
  />
    </MapContainer>
    
  );
};

export default MapComponent;