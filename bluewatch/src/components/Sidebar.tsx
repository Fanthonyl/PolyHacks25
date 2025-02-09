import { useState } from "react";
import { Home, LayoutGrid, User, Settings, ChevronFirst, ChevronLast } from "lucide-react";

const Sidebar = () => {
  const [expanded, setExpanded] = useState(true);

  return (
    <div className="flex">
      {/* Sidebar */}
      <aside className={`h-screen bg-gray-900 text-white p-5 transition-all duration-300 ${expanded ? "w-64" : "w-20"}`}>
        {/* Toggle Button */}
        <button
          onClick={() => setExpanded(!expanded)}
          className="flex items-center justify-end w-full mb-4 text-gray-300 hover:text-white"
        >
          {expanded ? <ChevronFirst /> : <ChevronLast />}
        </button>

        {/* Menu Items */}
        <nav>
          <SidebarItem icon={<Home />} text="Dashboard" expanded={expanded} />
          <SidebarItem icon={<LayoutGrid />} text="Projects" expanded={expanded} />
          <SidebarItem icon={<User />} text="Profile" expanded={expanded} />
          <SidebarItem icon={<Settings />} text="Settings" expanded={expanded} />
        </nav>
      </aside>

      {/* Main Content */}
      <main className="flex-1 p-5">
        <h1 className="text-2xl font-bold">Contenu principal</h1>
      </main>
    </div>
  );
};

const SidebarItem = ({ icon, text, expanded }: { icon: JSX.Element; text: string; expanded: boolean }) => {
  return (
    <div className="flex items-center p-3 my-2 rounded-md hover:bg-gray-700 transition-all cursor-pointer">
      {icon}
      {expanded && <span className="ml-3">{text}</span>}
    </div>
  );
};

export default Sidebar;
