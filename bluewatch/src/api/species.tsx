// pages/api/species.ts

import { PrismaClient } from '@prisma/client';

const prisma = new PrismaClient();

import { NextApiRequest, NextApiResponse } from 'next';

export default async function handler(req: NextApiRequest, res: NextApiResponse) {
  if (req.method === 'GET') {
    try {
      const species = await prisma.animal_species.findMany();
      res.status(200).json(species);
    } catch (error) {
      console.error(error);
      res.status(500).json({ error: 'Failed to fetch species' });
    }
  } else {
    res.status(405).json({ error: 'Method Not Allowed' });
  }
}
